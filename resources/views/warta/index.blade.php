@extends('layouts.app')

@section('content')
    <section class="relative overflow-hidden bg-blue-950 text-white">
        <img
            src="{{ asset('images/foto-warta.jpg') }}"
            alt=""
            class="absolute inset-0 h-full w-full object-cover object-center"
            aria-hidden="true"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-blue-950/95 via-blue-950/80 to-slate-950/45"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <h1 class="font-serif text-4xl font-bold">Warta Jemaat GBIA GRAMMATA</h1>
            <p class="text-blue-100 mt-3 max-w-2xl">
                Artikel kekristenan, pengumuman, dan buletin mingguan gereja.
            </p>
        </div>
    </section>

    <section class="py-14 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[minmax(0,1fr)_320px]">
                <div>
                    <div class="grid gap-6 md:grid-cols-2">
                        @forelse ($articles as $article)
                            <article class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm flex flex-col">
                                @if ($article->thumbnail)
                                    <img
                                        src="{{ asset('storage/' . $article->thumbnail) }}"
                                        alt="{{ $article->title }}"
                                        loading="lazy"
                                        decoding="async"
                                        class="h-48 w-full object-cover"
                                    >
                                @else
                                    <div class="h-48 bg-gradient-to-br from-blue-900 to-primary flex items-center justify-center px-6">
                                        <span class="font-serif text-xl font-bold text-center text-white">GBIA GRAMMATA</span>
                                    </div>
                                @endif

                                <div class="p-6 flex flex-1 flex-col">
                                    <h3 class="font-serif text-xl font-bold text-slate-900">
                                        <a href="{{ route('warta.show', $article->slug) }}" class="hover:text-primary transition">
                                            {{ $article->title }}
                                        </a>
                                    </h3>
                                    @if ($article->excerpt)
                                        <p class="text-slate-600 mt-3 leading-relaxed">{{ $article->excerpt }}</p>
                                    @endif
                                    <a href="{{ route('warta.show', $article->slug) }}"
                                       class="mt-auto pt-5 text-sm font-semibold text-primary hover:text-blue-800">
                                        Baca selengkapnya
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
                        <h2 class="font-serif text-xl font-bold text-slate-900 mb-4">Arsip Warta</h2>

                        <div class="divide-y divide-slate-200">
                            @forelse ($archives as $archive)
                                @foreach ($archive->attachments as $attachment)
                                    <div class="py-4 first:pt-0 last:pb-0">
                                        <p class="break-words text-sm font-semibold leading-relaxed text-slate-800">
                                            {{ $attachment->file_name }}
                                        </p>
                                        <div class="mt-3 grid grid-cols-2 gap-2">
                                            <a href="{{ route('warta.view-attachment', $attachment) }}"
                                               target="_blank"
                                               rel="noopener"
                                               class="rounded-lg border border-primary px-3 py-2 text-center text-sm font-semibold text-primary transition hover:bg-blue-50">
                                                Baca
                                            </a>
                                            <a href="{{ route('warta.download-attachment', $attachment) }}"
                                               class="rounded-lg bg-primary px-3 py-2 text-center text-sm font-semibold text-white transition hover:bg-blue-800">
                                                Download
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @empty
                                <p class="text-sm text-slate-600">Belum ada arsip warta.</p>
                            @endforelse
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
