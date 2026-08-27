# Task: Pengoptimalan Proyek, Pembersihan Kolom Database, dan Konfigurasi Sistem

Dokumen ini adalah panduan kerja komprehensif bagi AI / Developer untuk melakukan pengoptimalan menyeluruh pada proyek **GBIA GRAMMATA (Laravel 11)**, meliputi pembersihan kolom database tidak terpakai, optimasi konfigurasi lingkungan, performa query, aset, dan caching produksi.

---

## 🎯 Ringkasan Tujuan
1. **Pembersihan Database**: Menghapus kolom database yang sudah tidak digunakan (`description` pada tabel `magazines`, dll.) dan menyesuaikan model serta controller terkait.
2. **Optimasi Index Database**: Menambahkan database index pada kolom yang sering digunakan untuk filter dan sorting (`publish_date`, `published_at`, `is_published`).
3. **Optimasi Query Eloquent**: Mencegah overhead memori dengan memilih kolom spesifik (`select()`) saat pagination warta agar tidak meload kolom `longText` (`body`).
4. **Konfigurasi Sistem & Lokalisasi**: Mengatur `APP_NAME`, `APP_TIMEZONE` (`Asia/Jakarta`), dan `APP_LOCALE` (`id`) di `.env` dan `config/app.php` agar penanggalan Carbon berbahasa Indonesia seragam.
5. **Optimasi Aset & Media**: Kompresi gambar berukuran besar di `public/images/`, menambahkan `loading="lazy"` pada gambar HTML, dan implementasi HTTP caching header untuk file PDF.
7. **Pembersihan Berkas Tidak Terpakai**: Menghapus file default skeleton Laravel yang tidak pernah dipakai (`resources/views/welcome.blade.php`, `database/database.sqlite`, dll.).
8. **Production Caching Readiness**: Menyiapkan pipeline perintah caching resmi Laravel (`config:cache`, `route:cache`, `view:cache`, autoloader optimization).

---

## 📂 File yang Terkait & Dimodifikasi
- **Database**:
  - `database/migrations/xxxx_xx_xx_xxxxxx_drop_description_from_magazines_table.php` (baru)
  - `database/migrations/xxxx_xx_xx_xxxxxx_add_indexes_to_tables.php` (baru)
  - `app/Models/Magazine.php`
  - `app/Models/Article.php`
- **Controllers**:
  - `app/Http/Controllers/Admin/AdminMagazineController.php`
  - `app/Http/Controllers/Admin/AdminWartaController.php`
  - `app/Http/Controllers/WartaController.php`
  - `app/Http/Controllers/PedangRohController.php`
- **Konfigurasi & Environment**:
  - `.env` & `.env.example`
  - `config/app.php`
- **Views**:
  - `resources/views/home.blade.php`
  - `resources/views/about.blade.php`
  - `resources/views/warta/index.blade.php`
  - `resources/views/pedang-roh/index.blade.php`
- **Berkas yang Dihapus (Delete)**:
  - `resources/views/welcome.blade.php` (bawaan Laravel, digantikan oleh `home.blade.php`)
  - `database/database.sqlite` (tidak terpakai karena menggunakan MySQL)
  - `.phpunit.result.cache` (cache lokal)

---

## 📋 Rincian Langkah Kerja (Step-by-Step)

### 1. Pembersihan Kolom Database yang Tidak Terpakai

#### A. Hapus Kolom `description` pada Tabel `magazines`
Kolom `description` sudah tidak memiliki form input dan tidak ditampilkan di antarmuka publik maupun admin.

1. **Buat Migration Baru**:
   ```bash
   php artisan make:migration drop_description_from_magazines_table --table=magazines
   ```
2. **Isi Migration**:
   ```php
   public function up(): void
   {
       Schema::table('magazines', function (Blueprint $table) {
           if (Schema::hasColumn('magazines', 'description')) {
               $table->dropColumn('description');
           }
       });
   }

   public function down(): void
   {
       Schema::table('magazines', function (Blueprint $table) {
           $table->text('description')->nullable();
       });
   }
   ```
3. **Jalankan Migration**:
   ```bash
   php artisan migrate
   ```
4. **Update `app/Models/Magazine.php`**:
   Hapus `'description'` dari array `$fillable`:
   ```php
   protected $fillable = [
       'title',
       'edition_number',
       'publish_date',
       'cover_image',
       'pdf_file',
   ];
   ```
5. **Update `app/Http/Controllers/Admin/AdminMagazineController.php`**:
   - Hapus aturan validasi `'description' => 'nullable'` di method `store` dan `update`.
   - Hapus field `'description' => $request->description` pada method `Magazine::create(...)` dan `$pedang_roh->update(...)`.

---

### 2. Optimasi Indeks Database (Query Indexing)

Tabel `magazines` dan `articles` sering difilter dan diurutkan berdasarkan tanggal atau status publikasi.

1. **Buat Migration Index**:
   ```bash
   php artisan make:migration add_performance_indexes_to_tables
   ```
2. **Isi Migration**:
   ```php
   public function up(): void
   {
       Schema::table('magazines', function (Blueprint $table) {
           $table->index('publish_date');
       });

       Schema::table('articles', function (Blueprint $table) {
           $table->index(['is_published', 'published_at']);
       });
   }

   public function down(): void
   {
       Schema::table('magazines', function (Blueprint $table) {
           $table->dropIndex(['publish_date']);
       });

       Schema::table('articles', function (Blueprint $table) {
           $table->dropIndex(['is_published', 'published_at']);
       });
   }
   ```
3. **Jalankan Migration**:
   ```bash
   php artisan migrate
   ```

---

### 3. Optimasi Query Eloquent & Penggunaan Memori

#### A. Hindari Mengambil `body` (longText) pada Daftar Warta
Pada `app/Http/Controllers/WartaController.php`:
Halaman indeks warta hanya membutuhkan thumbnail, judul, excerpt, dan slug. Tidak perlu meload teks lengkap artikel (`body`) untuk 6 artikel sekaligus dari database:

```php
public function index(): View
{
    $articles = Article::query()
        ->select(['id', 'title', 'slug', 'excerpt', 'thumbnail', 'published_at', 'is_published'])
        ->where('is_published', true)
        ->latest('published_at')
        ->paginate(6);

    $archives = Article::query()
        ->select(['id', 'title', 'slug', 'published_at', 'is_published'])
        ->where('is_published', true)
        ->has('attachments')
        ->with(['attachments:id,article_id,file_name,file_path,file_size'])
        ->latest('published_at')
        ->take(4)
        ->get();

    return view('warta.index', compact('articles', 'archives'));
}
```

#### B. Optimasi Query Tahun Majalah pada `PedangRohController.php`
Gunakan query yang memanfaatkan index `publish_date`:
```php
$years = Magazine::query()
    ->selectRaw('YEAR(publish_date) as year')
    ->distinct()
    ->orderByDesc('year')
    ->pluck('year');
```

#### C. Tambahkan Header Caching pada Unduhan/Streaming PDF
Pada method `view` dan `viewAttachment` di `PedangRohController` dan `WartaController`, tambahkan header `Cache-Control` agar browser pengguna menyimpan cache PDF dan tidak mengunduh ulang secara berulang:
```php
return Storage::disk('public')->response(
    $magazine->pdf_file,
    $magazine->title . '.pdf',
    [
        'Content-Type' => 'application/pdf',
        'Cache-Control' => 'public, max-age=86400',
    ]
);
```

---

### 4. Standarisasi Konfigurasi & Lokalisasi

#### A. Update `.env` & `.env.example`
Sesuaikan identitas aplikasi dan zona waktu:
```ini
APP_NAME="GBIA GRAMMATA"
APP_TIMEZONE=Asia/Jakarta
APP_LOCALE=id
APP_FALLBACK_LOCALE=id
```

#### B. Update `config/app.php`
Pastikan konfigurasi membaca nilai environment dengan default yang tepat:
```php
'name' => env('APP_NAME', 'GBIA GRAMMATA'),
'timezone' => env('APP_TIMEZONE', 'Asia/Jakarta'),
'locale' => env('APP_LOCALE', 'id'),
'fallback_locale' => env('APP_FALLBACK_LOCALE', 'id'),
```
*Manfaat: Semua tanggal otomatis berformat bahasa Indonesia dan jam upload/database selaras dengan waktu Serpong (WIB).*

---

### 5. Optimasi Aset Frontend & Gambar

#### A. Tambahkan Atribut `loading="lazy"` dan `decoding="async"`
Pastikan seluruh elemen gambar non-hero pada file Blade memiliki atribut lazy loading:
- `resources/views/about.blade.php` (foto tunas jemaat, foto gembala)
- `resources/views/warta/index.blade.php` (thumbnail warta)
- `resources/views/pedang-roh/index.blade.php` (cover majalah)

Contoh:
```html
<img src="{{ asset('images/Tanjung Burung.jpeg') }}" 
     alt="GBIA Tanjung Burung" 
     loading="lazy" 
     decoding="async" 
     class="h-48 w-full object-cover rounded-t-xl">
```

#### B. Optimasi Ukuran Gambar Asli (`public/images/`)
File seperti `public/images/foto-beranda.jpg` (3.5 MB) dan `gembala.jpg` (1.3 MB) sangat memperlambat akses internet mobile.
- Lakukan kompresi atau konversi kualitas (misal via tinypng / cwebp / image tool) dengan target maksimal 150 KB – 300 KB per gambar tanpa penurunan kualitas visual yang tampak.

---

### 6. Pembersihan Berkas yang Tidak Terpakai (Dead / Redundant Files)

Hapus file-file bawaan default atau berkas sampah yang tidak pernah digunakan lagi dalam aplikasi:

1. **`resources/views/welcome.blade.php`** (Ukuran ~72 KB)
   - **Alasan**: Merupakan halaman selamat datang bawaan skeleton Laravel. Karena rute utama (`/`) sudah diarahkan ke `home.blade.php`, file ini tidak pernah dipanggil dan menjadi *dead code*.
   - **Aksi**: Hapus berkas `resources/views/welcome.blade.php`.
   - **Perintah**:
     ```bash
     rm resources/views/welcome.blade.php
     # atau di PowerShell:
     Remove-Item resources/views/welcome.blade.php
     ```

2. **`database/database.sqlite`** (Ukuran ~98 KB)
   - **Alasan**: File database SQLite default yang terbuat saat inisialisasi proyek. Sistem saat ini sudah berjalan aktif di database MySQL (`db_website_gereja`), sehingga file ini redundan dan memakan ruang repository.
   - **Aksi**: Hapus berkas `database/database.sqlite`.
   - **Perintah**:
     ```bash
     rm database/database.sqlite
     # atau di PowerShell:
     Remove-Item database/database.sqlite
     ```

3. **`.phpunit.result.cache`**
   - **Alasan**: Berkas cache hasil testing unit lokal yang tidak perlu ditrack di repository git.
   - **Aksi**: Hapus jika ada di direktori kerja.

---

### 7. Pipeline Optimasi Caching untuk Lingkungan Produksi

Jalankan perintah optimasi resmi Laravel ketika proyek dideploy ke server:
```bash
# 1. Bersihkan cache lama
php artisan optimize:clear

# 2. Cache konfigurasi (.env & config/*.php)
php artisan config:cache

# 3. Cache daftar rute (routing table)
php artisan route:cache

# 4. Cache template Blade
php artisan view:cache

# 5. Optimasi class autoloader Composer
composer dump-autoload -o --no-dev
```

---

## ✅ Kriteria Selesai (Checklist)
- [ ] Kolom `description` pada tabel `magazines` berhasil dihapus via migration tanpa merusak data lain.
- [ ] Model `Magazine.php` dan `AdminMagazineController.php` sudah bersih dari referensi `description`.
- [ ] Indeks database berhasil ditambahkan pada `publish_date` dan `[is_published, published_at]`.
- [ ] Query `WartaController::index` teroptimasi dengan `select()` kolom tertentu (tidak meload field `body`).
- [ ] Timezone `Asia/Jakarta` dan locale `id` aktif di `config/app.php` dan `.env`.
- [ ] Header HTTP Cache disertakan pada respon file PDF publik.
- [ ] Atribut `loading="lazy"` terpasang pada gambar-gambar non-hero di seluruh halaman view.
- [ ] Berkas tidak terpakai (`resources/views/welcome.blade.php` dan `database/database.sqlite`) berhasil dihapus.
- [ ] Perintah `php artisan optimize` atau `config:cache` & `route:cache` berjalan lancar tanpa error.
