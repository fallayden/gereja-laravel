@extends('layouts.admin')

@section('page-title', 'Tambah Warta Jemaat')

@section('content')
    <div class="mb-7">
        <a href="{{ route('admin.warta.index') }}" class="text-sm font-semibold text-primary hover:text-blue-800">Kembali ke daftar</a>
        <h1 class="mt-3 font-serif text-3xl font-bold text-slate-900">Tambah Warta Jemaat</h1>
        <p class="mt-2 text-slate-600">Warta akan langsung diterbitkan setelah disimpan.</p>
    </div>

    <form method="POST" action="{{ route('admin.warta.store') }}" enctype="multipart/form-data"
          class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
        @csrf

        @if ($errors->any())
            <div role="alert" class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                <p class="font-semibold">Periksa kembali data berikut:</p>
                <ul class="mt-2 list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="space-y-6">
            <div>
                <label for="title" class="block text-sm font-semibold text-slate-700">Judul artikel</label>
                <input id="title" name="title" type="text" value="{{ old('title') }}" required maxlength="255"
                       class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-primary focus:ring-2 focus:ring-blue-100"
                       placeholder="Contoh: Judul Artikel / Warta Mingguan">
                @error('title')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <div class="flex flex-wrap items-center justify-between gap-2">
                    <label for="body" class="block text-sm font-semibold text-slate-700">Isi warta</label>
                    <button type="button" data-normalize-text="body"
                            class="text-sm font-semibold text-primary hover:text-blue-800">
                        Rapikan teks
                    </button>
                </div>
                <textarea id="body" name="body" rows="12" required data-normalize-paste
                          aria-describedby="body-format-help body-format-status"
                          class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-3 leading-relaxed outline-none focus:border-primary focus:ring-2 focus:ring-blue-100"
                          placeholder="Tuliskan isi warta jemaat...">{{ old('body') }}</textarea>
                <div class="mt-2 flex flex-wrap items-center justify-between gap-2 text-xs">
                    <p id="body-format-help" class="text-slate-500">Teks hasil paste otomatis dirapikan tanpa menghapus pemisah paragraf.</p>
                    <p id="body-format-status" data-format-status class="font-semibold text-emerald-700" aria-live="polite"></p>
                </div>
                @error('body')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label for="thumbnail" class="block text-sm font-semibold text-slate-700">Gambar sampul <span class="font-normal text-slate-400">(opsional)</span></label>
                    <input id="thumbnail" name="thumbnail" type="file" accept="image/*"
                           class="mt-2 block w-full rounded-lg border border-slate-300 bg-white text-sm file:mr-4 file:border-0 file:bg-blue-50 file:px-4 file:py-3 file:font-semibold file:text-primary">
                    <p class="mt-2 text-xs text-slate-500">Format gambar, maksimal 2 MB.</p>
                    @error('thumbnail')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="pdf_attachment" class="block text-sm font-semibold text-slate-700">Lampiran PDF <span class="font-normal text-slate-400">(opsional)</span></label>
                    <input id="pdf_attachment" name="pdf_attachment" type="file" accept="application/pdf"
                           class="mt-2 block w-full rounded-lg border border-slate-300 bg-white text-sm file:mr-4 file:border-0 file:bg-blue-50 file:px-4 file:py-3 file:font-semibold file:text-primary">
                    <p class="mt-2 text-xs text-slate-500">Dokumen PDF, maksimal 10 MB.</p>
                    @error('pdf_attachment')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <div class="mt-8 flex flex-wrap justify-end gap-3 border-t border-slate-200 pt-6">
            <a href="{{ route('admin.warta.index') }}" class="rounded-lg border border-slate-300 px-5 py-3 font-semibold text-slate-700 hover:bg-slate-50">Batal</a>
            <button type="submit" class="rounded-lg bg-primary px-5 py-3 font-semibold text-white hover:bg-blue-800">Terbitkan Warta</button>
        </div>
    </form>
@endsection
