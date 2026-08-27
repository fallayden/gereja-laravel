@extends('layouts.app')

@section('content')
    <section class="relative overflow-hidden bg-blue-950 text-white">
        <img
            src="{{ asset('images/foto-pedang-roh.jpg') }}"
            alt=""
            class="absolute inset-0 h-full w-full object-cover object-center"
            aria-hidden="true"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-blue-950/95 via-blue-950/80 to-slate-950/50"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 lg:py-16">
            <p class="text-blue-200 text-sm font-semibold uppercase tracking-wider">Majalah Rohani</p>
            <h1 class="font-serif text-4xl sm:text-5xl font-bold mt-2">Pedang Roh</h1>
            <p class="mt-4 max-w-2xl text-blue-100 leading-relaxed">
                Baca dan unduh majalah Pedang Roh untuk menemani pertumbuhan iman Anda.
            </p>

            <form method="GET" action="{{ route('pedang-roh.index') }}"
                  class="mt-8 grid gap-3 rounded-xl bg-white/10 p-4 backdrop-blur-sm sm:grid-cols-[minmax(0,1fr)_180px_auto]">
                <label class="sr-only" for="search">Cari majalah</label>
                <input
                    id="search"
                    name="search"
                    type="search"
                    value="{{ request('search') }}"
                    placeholder="Cari judul atau nomor edisi..."
                    class="w-full rounded-lg border-0 bg-white px-4 py-3 text-slate-900 placeholder:text-slate-400 focus:ring-2 focus:ring-blue-300"
                >

                <label class="sr-only" for="year">Pilih tahun</label>
                <select id="year" name="year"
                        class="w-full rounded-lg border-0 bg-white px-4 py-3 text-slate-900 focus:ring-2 focus:ring-blue-300">
                    <option value="">Semua tahun</option>
                    @foreach ($years as $year)
                        <option value="{{ $year }}" @selected((string) request('year') === (string) $year)>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>

                <button type="submit"
                        class="rounded-lg bg-white px-5 py-3 font-semibold text-primary hover:bg-blue-50 transition">
                    Cari
                </button>
            </form>
        </div>
    </section>

    <section class="py-14 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (request()->filled('search') || request()->filled('year'))
                <div class="mb-7 flex flex-wrap items-center justify-between gap-3">
                    <p class="text-slate-600">
                        Menampilkan hasil penyaringan majalah.
                    </p>
                    <a href="{{ route('pedang-roh.index') }}" class="text-sm font-semibold text-primary hover:text-blue-800">
                        Hapus filter
                    </a>
                </div>
            @endif

            <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @forelse ($magazines as $magazine)
                    <article class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm flex flex-col">
                        @if ($magazine->cover_image)
                            <img
                                src="{{ asset('storage/' . $magazine->cover_image) }}"
                                alt="Sampul {{ $magazine->title }}"
                                class="aspect-[3/4] w-full object-cover"
                            >
                        @else
                            <div class="aspect-[3/4] bg-gradient-to-br from-blue-950 via-primary to-blue-600 p-7 text-white flex flex-col justify-between">
                                <span class="text-xs font-semibold uppercase tracking-[0.2em] text-blue-200">GBIA GRAMMATA</span>
                                <div>
                                    <p class="font-serif text-3xl font-bold">Pedang Roh</p>
                                    <p class="mt-2 text-sm text-blue-100">{{ $magazine->edition_number }}</p>
                                </div>
                            </div>
                        @endif

                        <div class="p-5 flex flex-1 flex-col">
                            <p class="text-sm font-semibold text-primary">{{ $magazine->edition_number }}</p>
                            <h2 class="font-serif text-xl font-bold text-slate-900 mt-1">{{ $magazine->title }}</h2>
                            <time class="mt-2 text-sm text-slate-500" datetime="{{ $magazine->publish_date->toDateString() }}">
                                {{ $magazine->publish_date->translatedFormat('d F Y') }}
                            </time>

                            @if ($magazine->description)
                                <p class="mt-3 text-sm leading-relaxed text-slate-600">
                                    {{ Str::limit($magazine->description, 120) }}
                                </p>
                            @endif

                            <div class="mt-auto pt-5 grid grid-cols-2 gap-2">
                                <a href="{{ route('pedang-roh.view', $magazine) }}" target="_blank" rel="noopener"
                                   class="rounded-lg border border-primary px-3 py-2 text-center text-sm font-semibold text-primary hover:bg-blue-50 transition">
                                    Baca
                                </a>
                                <a href="{{ route('pedang-roh.download', $magazine) }}"
                                   class="rounded-lg bg-primary px-3 py-2 text-center text-sm font-semibold text-white hover:bg-blue-800 transition">
                                    Unduh
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="sm:col-span-2 lg:col-span-3 xl:col-span-4 rounded-xl border border-dashed border-slate-300 bg-white p-10 text-center">
                        <h2 class="font-serif text-xl font-bold text-slate-800">Majalah belum tersedia</h2>
                        <p class="mt-2 text-slate-600">
                            @if (request()->filled('search') || request()->filled('year'))
                                Tidak ada majalah yang sesuai dengan pencarian Anda.
                            @else
                                Edisi Pedang Roh yang telah diunggah akan tampil di sini.
                            @endif
                        </p>
                    </div>
                @endforelse
            </div>

            @if ($magazines->hasPages())
                <div class="mt-9">
                    {{ $magazines->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
