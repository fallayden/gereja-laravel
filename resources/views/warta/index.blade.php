@extends('layouts.app')

@section('content')
    <section class="bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <p class="text-blue-200 text-sm font-semibold uppercase tracking-wider">Informasi Jemaat</p>
            <h1 class="font-serif text-4xl font-bold mt-2">Warta Jemaat</h1>
            <p class="text-blue-100 mt-3 max-w-2xl">
                Ikuti kabar, pengumuman, dan kegiatan terbaru dari GBIA GRAMMATA.
            </p>
        </div>
    </section>

    <section class="py-14 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[minmax(0,1fr)_320px]">
                <div>
                    <h2 class="font-serif text-2xl font-bold text-slate-900 mb-6">Warta Terbaru</h2>

                    <div class="grid gap-6 md:grid-cols-2">
                        @forelse ($articles as $article)
                            <article class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm flex flex-col">
                                @if ($article->thumbnail)
                                    <img
                                        src="{{ asset('storage/' . $article->thumbnail) }}"
                                        alt="{{ $article->title }}"
                                        class="h-48 w-full object-cover"
                                    >
                                @else
                                    <div class="h-48 bg-gradient-to-br from-blue-900 to-primary flex items-center justify-center px-6">
                                        <span class="font-serif text-xl font-bold text-center text-white">GBIA GRAMMATA</span>
                                    </div>
                                @endif

                                <div class="p-6 flex flex-1 flex-col">
                                    <time class="text-sm font-semibold text-primary" datetime="{{ optional($article->published_at)->toDateString() }}">
                                        {{ optional($article->published_at)->translatedFormat('d F Y') ?? 'Tanggal belum tersedia' }}
                                    </time>
                                    <h3 class="font-serif text-xl font-bold text-slate-900 mt-2">
                                        <a href="{{ route('warta.show', $article->slug) }}" class="hover:text-primary transition">
                                            {{ $article->title }}
                                        </a>
                                    </h3>
                                    @if ($article->excerpt)
                                        <p class="text-slate-600 mt-3 leading-relaxed">{{ $article->excerpt }}</p>
                                    @endif
                                    <a href="{{ route('warta.show', $article->slug) }}"
                                       class="mt-auto pt-5 text-sm font-semibold text-primary hover:text-blue-800">
                                        Baca selengkapnya &rarr;
                                    </a>
                                </div>
                            </article>
                        @empty
                            <div class="md:col-span-2 rounded-xl border border-dashed border-slate-300 bg-white p-10 text-center">
                                <h3 class="font-serif text-xl font-bold text-slate-800">Belum ada warta</h3>
                                <p class="text-slate-600 mt-2">Warta jemaat yang telah diterbitkan akan tampil di sini.</p>
                            </div>
                        @endforelse
                    </div>

                    @if ($articles->hasPages())
                        <div class="mt-8">
                            {{ $articles->links() }}
                        </div>
                    @endif
                </div>

                <aside>
                    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm lg:sticky lg:top-24">
                        <h2 class="font-serif text-xl font-bold text-slate-900">Arsip Lampiran</h2>
                        <p class="text-sm text-slate-500 mt-2 mb-5">Warta terbaru yang memiliki dokumen lampiran.</p>

                        <div class="divide-y divide-slate-200">
                            @forelse ($archives as $archive)
                                <div class="py-4 first:pt-0 last:pb-0">
                                    <a href="{{ route('warta.show', $archive->slug) }}"
                                       class="font-semibold text-slate-800 hover:text-primary transition">
                                        {{ $archive->title }}
                                    </a>
                                    <p class="text-xs text-slate-500 mt-1">
                                        {{ optional($archive->published_at)->translatedFormat('d F Y') }}
                                        &middot; {{ $archive->attachments->count() }} lampiran
                                    </p>
                                </div>
                            @empty
                                <p class="text-sm text-slate-600">Belum ada arsip lampiran.</p>
                            @endforelse
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
