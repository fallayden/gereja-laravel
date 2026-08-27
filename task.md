# Task: Penyesuaian Form & Tampilan Admin Warta, Publik Warta, dan Pedang Roh

Dokumen ini adalah instruksi kerja bagi AI / Developer untuk melakukan penyesuaian pada fitur **Admin Warta**, **Halaman Publik Warta**, dan **Form Pedang Roh**.

---

## 🎯 Ringkasan Tujuan
1. **Admin Warta**: Hapus kolom/tampilan jam dan tanggal terbit pada tabel daftar warta.
2. **Halaman Publik Warta**: Hapus teks "Diterbitkan tanggal..." pada detail warta dan daftar warta (karena informasi tanggal sudah tertera di judul/nama file).
3. **Form Warta (Tambah & Edit)**: Ganti label input `Judul warta` menjadi `Judul artikel`.
4. **Pedang Roh (Tambah & Edit)**: Hapus form input `Deskripsi (opsional)`.

---

## 📂 File yang Dimodifikasi
1. **Admin Warta**:
   - `resources/views/admin/warta/index.blade.php` (hapus kolom tanggal terbit)
   - `resources/views/admin/warta/create.blade.php` (ganti label judul warta -> judul artikel)
   - `resources/views/admin/warta/edit.blade.php` (ganti label judul warta -> judul artikel)
2. **Halaman Publik Warta**:
   - `resources/views/warta/show.blade.php` (hapus tampilan tanggal terbit)
   - `resources/views/warta/index.blade.php` (hapus tanggal di arsip samping jika masih ada)
3. **Admin Pedang Roh**:
   - `resources/views/admin/pedang-roh/create.blade.php` (hapus field input deskripsi)
   - `resources/views/admin/pedang-roh/edit.blade.php` (hapus field input deskripsi)

---

## 📋 Panduan Perubahan Rinci (Step-by-Step)

### 1. Admin Warta — Hapus Jam & Tanggal Terbit
**File**: `resources/views/admin/warta/index.blade.php`

- **Hapus Header Kolom "Tanggal Terbit"**:
  ```html
  <!-- HAPUS BARIS INI: -->
  <th class="px-6 py-4">Tanggal Terbit</th>
  ```

- **Hapus Sel Data Jam & Tanggal Terbit**:
  ```html
  <!-- HAPUS BLOK TD INI: -->
  <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-600">
      {{ optional($article->published_at)->translatedFormat('d M Y, H:i') ?? '—' }}
  </td>
  ```

- **Perbarui Colspan Tabel Saat Kosong**:
  Ubah `colspan="4"` menjadi `colspan="3"` pada baris pesan kosong:
  ```html
  <!-- SEBELUM: -->
  <td colspan="4" class="px-6 py-14 text-center">

  <!-- SESUDAH: -->
  <td colspan="3" class="px-6 py-14 text-center">
  ```

---

### 2. Form Pengisian Warta — Ganti Label Menjadi "Judul Artikel"
**File**: 
- `resources/views/admin/warta/create.blade.php`
- `resources/views/admin/warta/edit.blade.php`

- **Ubah Label Input Judul**:
  
  **Sebelum:**
  ```html
  <label for="title" class="block text-sm font-semibold text-slate-700">Judul warta</label>
  ```
  
  **Sesudah:**
  ```html
  <label for="title" class="block text-sm font-semibold text-slate-700">Judul artikel</label>
  ```

- *(Opsional pada `create.blade.php`)*: Sesuaikan placeholder menjadi:
  ```html
  placeholder="Contoh: Judul Artikel / Warta Mingguan"
  ```

---

### 3. Halaman Publik Warta — Hapus "Diterbitkan Tanggal"
**File**: `resources/views/warta/show.blade.php`

- **Hapus Elemen Waktu Penerbitan**:
  Pada header detail artikel warta:
  
  ```html
  <!-- HAPUS ELEMEN INI: -->
  <time class="mt-5 block text-blue-100" datetime="{{ optional($article->published_at)->toDateString() }}">
      Diterbitkan {{ optional($article->published_at)->translatedFormat('d F Y, H:i') ?? 'tanpa tanggal' }} WIB
  </time>
  ```

**File**: `resources/views/warta/index.blade.php` (sidebar Arsip Warta)
- Jika masih ada tampilan tanggal di bawah judul pada list arsip, hapus elemen tanggalnya agar bersih:
  ```html
  <!-- HAPUS BAGIAN INI DARI DAFTAR ARSIP: -->
  <p class="text-xs text-slate-500 mt-1">
      {{ optional($archive->published_at)->translatedFormat('d F Y') }}
  </p>
  ```

---

### 4. Pedang Roh — Hapus Form Deskripsi (Opsional)
**File**: 
- `resources/views/admin/pedang-roh/create.blade.php`
- `resources/views/admin/pedang-roh/edit.blade.php`

- **Hapus Blok Input Field Deskripsi**:
  
  ```html
  <!-- HAPUS SELURUH BLOK INI: -->
  <div class="md:col-span-2">
      <label for="description" class="block text-sm font-semibold text-slate-700">Deskripsi <span class="font-normal text-slate-400">(opsional)</span></label>
      <textarea id="description" name="description" rows="5"
                class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-3 leading-relaxed outline-none focus:border-primary focus:ring-2 focus:ring-blue-100"
                placeholder="Ringkasan isi majalah...">{{ old('description') }}</textarea>
      @error('description')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
  </div>
  ```

  *(Catatan: Di controller `AdminMagazineController.php`, field `description` bersifat `nullable`, sehingga penghapusan field dari form aman dan tidak akan merusak proses penyimpanan).*

---

## ✅ Kriteria Selesai (Checklist)
- [ ] Di tabel `admin/warta/index.blade.php`, kolom dan data tanggal/jam terbit sudah dihapus, layout tabel tetap rapi.
- [ ] Di form `admin/warta/create.blade.php` & `admin/warta/edit.blade.php`, label judul sudah menjadi **Judul artikel**.
- [ ] Di halaman publik `warta/show.blade.php`, tulisan **Diterbitkan [tanggal] WIB** sudah dihapus.
- [ ] Di form `admin/pedang-roh/create.blade.php` & `admin/pedang-roh/edit.blade.php`, field **Deskripsi (opsional)** sudah dihapus.
- [ ] Form submit warta dan majalah tetap berjalan normal tanpa error validasi.
