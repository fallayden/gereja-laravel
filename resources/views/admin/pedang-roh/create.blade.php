@extends('layouts.admin')

@section('page-title', 'Unggah Pedang Roh')

@section('content')
    <div class="mb-7">
        <a href="{{ route('admin.pedang-roh.index') }}" class="text-sm font-semibold text-primary hover:text-blue-800">&larr; Kembali ke daftar</a>
        <h1 class="mt-3 font-serif text-3xl font-bold text-slate-900">Unggah Majalah Pedang Roh</h1>
        <p class="mt-2 text-slate-600">Majalah akan langsung tersedia di halaman publik setelah disimpan.</p>
    </div>

    <form method="POST" action="{{ route('admin.pedang-roh.store') }}" enctype="multipart/form-data"
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

        <div class="grid gap-6 md:grid-cols-2">
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-semibold text-slate-700">Judul majalah</label>
                <input id="title" name="title" type="text" value="{{ old('title') }}" required maxlength="255"
                       class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-primary focus:ring-2 focus:ring-blue-100"
                       placeholder="Contoh: Pedang Roh — Bertumbuh dalam Iman">
                @error('title')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="edition_number" class="block text-sm font-semibold text-slate-700">Nomor edisi</label>
                <input id="edition_number" name="edition_number" type="text" value="{{ old('edition_number') }}" required
                       class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-primary focus:ring-2 focus:ring-blue-100"
                       placeholder="Contoh: Edisi 12 / 2026">
                @error('edition_number')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="publish_date" class="block text-sm font-semibold text-slate-700">Tanggal terbit</label>
                <input id="publish_date" name="publish_date" type="date" value="{{ old('publish_date') }}" required
                       class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-primary focus:ring-2 focus:ring-blue-100">
                @error('publish_date')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-semibold text-slate-700">Deskripsi <span class="font-normal text-slate-400">(opsional)</span></label>
                <textarea id="description" name="description" rows="5"
                          class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-3 leading-relaxed outline-none focus:border-primary focus:ring-2 focus:ring-blue-100"
                          placeholder="Ringkasan isi majalah...">{{ old('description') }}</textarea>
                @error('description')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="cover_image" class="block text-sm font-semibold text-slate-700">Gambar sampul <span class="font-normal text-slate-400">(opsional)</span></label>
                <input id="cover_image" name="cover_image" type="file" accept="image/*"
                       class="mt-2 block w-full rounded-lg border border-slate-300 bg-white text-sm file:mr-4 file:border-0 file:bg-blue-50 file:px-4 file:py-3 file:font-semibold file:text-primary">
                <p class="mt-2 text-xs text-slate-500">JPG, PNG, atau format gambar lain; maksimal 2 MB.</p>
                @error('cover_image')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="pdf_file" class="block text-sm font-semibold text-slate-700">Berkas majalah PDF</label>
                <input id="pdf_file" name="pdf_file" type="file" accept="application/pdf" required
                       class="mt-2 block w-full rounded-lg border border-slate-300 bg-white text-sm file:mr-4 file:border-0 file:bg-blue-50 file:px-4 file:py-3 file:font-semibold file:text-primary">
                <p class="mt-2 text-xs text-slate-500">Wajib berupa PDF; maksimal 20 MB.</p>
                @error('pdf_file')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="mt-8 flex flex-wrap justify-end gap-3 border-t border-slate-200 pt-6">
            <a href="{{ route('admin.pedang-roh.index') }}" class="rounded-lg border border-slate-300 px-5 py-3 font-semibold text-slate-700 hover:bg-slate-50">Batal</a>
            <button type="submit" class="rounded-lg bg-primary px-5 py-3 font-semibold text-white hover:bg-blue-800">Unggah Majalah</button>
        </div>
    </form>
@endsection
