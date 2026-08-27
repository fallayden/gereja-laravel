@extends('layouts.admin')

@section('page-title', 'Edit Pedang Roh')

@section('content')
    <div class="mb-7">
        <a href="{{ route('admin.pedang-roh.index') }}" class="text-sm font-semibold text-primary hover:text-blue-800">Kembali ke daftar</a>
        <h1 class="mt-3 font-serif text-3xl font-bold text-slate-900">Edit Majalah Pedang Roh</h1>
        <p class="mt-2 text-slate-600">Perbarui informasi majalah atau ganti sampul dan PDF.</p>
    </div>

    <form method="POST" action="{{ route('admin.pedang-roh.update', $pedang_roh) }}" enctype="multipart/form-data"
          class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
        @csrf
        @method('PUT')

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
                <input id="title" name="title" type="text" value="{{ old('title', $pedang_roh->title) }}" required maxlength="255"
                       class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-primary focus:ring-2 focus:ring-blue-100">
                @error('title')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="edition_number" class="block text-sm font-semibold text-slate-700">Nomor edisi</label>
                <input id="edition_number" name="edition_number" type="text" value="{{ old('edition_number', $pedang_roh->edition_number) }}" required
                       class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-primary focus:ring-2 focus:ring-blue-100">
                @error('edition_number')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="publish_date" class="block text-sm font-semibold text-slate-700">Tanggal terbit</label>
                <input id="publish_date" name="publish_date" type="date" value="{{ old('publish_date', $pedang_roh->publish_date->format('Y-m-d')) }}" required
                       class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-primary focus:ring-2 focus:ring-blue-100">
                @error('publish_date')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="cover_image" class="block text-sm font-semibold text-slate-700">Ganti gambar sampul <span class="font-normal text-slate-400">(opsional)</span></label>
                @if ($pedang_roh->cover_image)
                    <img src="{{ asset('storage/' . $pedang_roh->cover_image) }}" alt="Sampul saat ini" class="mt-2 h-40 w-28 rounded-lg object-cover">
                @endif
                <input id="cover_image" name="cover_image" type="file" accept="image/*"
                       class="mt-3 block w-full rounded-lg border border-slate-300 bg-white text-sm file:mr-4 file:border-0 file:bg-blue-50 file:px-4 file:py-3 file:font-semibold file:text-primary">
                <p class="mt-2 text-xs text-slate-500">Kosongkan jika tidak ingin mengganti. Maksimal 2 MB.</p>
                @error('cover_image')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="pdf_file" class="block text-sm font-semibold text-slate-700">Ganti berkas PDF <span class="font-normal text-slate-400">(opsional)</span></label>
                <div class="mt-2 rounded-lg bg-slate-50 p-3 text-sm text-slate-600">PDF saat ini tetap digunakan jika tidak diganti.</div>
                <input id="pdf_file" name="pdf_file" type="file" accept="application/pdf"
                       class="mt-3 block w-full rounded-lg border border-slate-300 bg-white text-sm file:mr-4 file:border-0 file:bg-blue-50 file:px-4 file:py-3 file:font-semibold file:text-primary">
                <p class="mt-2 text-xs text-slate-500">PDF baru akan menggantikan berkas lama. Maksimal 20 MB.</p>
                @error('pdf_file')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="mt-8 flex flex-wrap justify-end gap-3 border-t border-slate-200 pt-6">
            <a href="{{ route('admin.pedang-roh.index') }}" class="rounded-lg border border-slate-300 px-5 py-3 font-semibold text-slate-700 hover:bg-slate-50">Batal</a>
            <button type="submit" class="rounded-lg bg-primary px-5 py-3 font-semibold text-white hover:bg-blue-800">Simpan Perubahan</button>
        </div>
    </form>
@endsection
