@extends('layouts.app')

@section('content')
    <article>
        <header class="bg-gradient-to-br from-blue-950 via-primary to-blue-700 text-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-14 lg:py-20">
                <a href="{{ route('warta.index') }}" class="inline-flex text-sm font-semibold text-blue-200 hover:text-white transition">
                    Kembali ke Warta Jemaat
                </a>
                <p class="mt-8 text-sm font-semibold uppercase tracking-wider text-blue-200">Artikel Kekristenan</p>
                <h1 class="mt-3 font-serif text-3xl font-bold leading-tight sm:text-4xl lg:text-5xl">
                    {{ $article->title }}
                </h1>
            </div>
        </header>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
            @if ($article->thumbnail)
                <img
                    src="{{ asset('storage/' . $article->thumbnail) }}"
                    alt="{{ $article->title }}"
                    class="mb-10 max-h-[520px] w-full rounded-2xl object-cover shadow-sm"
                >
            @endif

            <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm sm:p-9">
                <div class="break-words whitespace-pre-line text-left text-[1.05rem] leading-8 text-slate-700">{{ $article->body }}</div>
            </div>

            @if ($article->attachments->isNotEmpty())
                <section class="mt-10" aria-labelledby="attachments-heading">
                    <div class="mb-5">
                        <p class="text-sm font-semibold uppercase tracking-wider text-primary">Dokumen</p>
                        <h2 id="attachments-heading" class="mt-1 font-serif text-2xl font-bold text-slate-900">Lampiran Warta</h2>
                    </div>

                    <div class="space-y-3">
                        @foreach ($article->attachments as $attachment)
                            <div class="flex flex-col gap-4 rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:flex-row sm:items-center sm:justify-between">
                                <div class="min-w-0">
                                    <p class="truncate font-semibold text-slate-900">{{ $attachment->file_name }}</p>
                                    @if ($attachment->file_size)
                                        <p class="mt-1 text-sm text-slate-500">
                                            {{ number_format($attachment->file_size / 1024 / 1024, 2) }} MB
                                        </p>
                                    @endif
                                </div>
                                <div class="flex shrink-0 gap-2">
                                    <a href="{{ route('warta.view-attachment', $attachment) }}" target="_blank" rel="noopener"
                                       class="rounded-lg border border-primary px-4 py-2 text-sm font-semibold text-primary hover:bg-blue-50 transition">
                                        Baca PDF
                                    </a>
                                    <a href="{{ route('warta.download-attachment', $attachment) }}"
                                       class="rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white hover:bg-blue-800 transition">
                                        Unduh
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            <div class="mt-12 border-t border-slate-200 pt-8">
                <a href="{{ route('warta.index') }}" class="font-semibold text-primary hover:text-blue-800">
                    Lihat semua Warta Jemaat
                </a>
            </div>
        </div>
    </article>
@endsection
