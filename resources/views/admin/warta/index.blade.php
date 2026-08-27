@extends('layouts.admin')

@section('page-title', 'Kelola Warta Jemaat')

@section('content')
    <div class="mb-7 flex flex-wrap items-center justify-between gap-4">
        <div>
            <p class="text-sm font-semibold uppercase tracking-wider text-primary">Konten Gereja</p>
            <h1 class="mt-1 font-serif text-3xl font-bold text-slate-900">Warta Jemaat</h1>
            <p class="mt-2 text-slate-600">Kelola kabar dan pengumuman yang tampil di website.</p>
        </div>
        <a href="{{ route('admin.warta.create') }}"
           class="rounded-lg bg-primary px-5 py-3 font-semibold text-white shadow-sm hover:bg-blue-800 transition">
            + Tambah Warta
        </a>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                        <th class="px-6 py-4">Warta</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse ($articles as $article)
                        <tr class="align-middle">
                            <td class="px-6 py-4">
                                <div class="flex min-w-64 items-center gap-4">
                                    @if ($article->thumbnail)
                                        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="" loading="lazy" decoding="async" class="h-14 w-20 rounded-lg object-cover">
                                    @else
                                        <div class="h-14 w-20 shrink-0 rounded-lg bg-blue-50 flex items-center justify-center text-xs font-bold text-primary">WARTA</div>
                                    @endif
                                    <div>
                                        <p class="font-semibold text-slate-900">{{ $article->title }}</p>
                                        <p class="mt-1 max-w-md text-sm text-slate-500">{{ Str::limit($article->excerpt, 80) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                @if ($article->is_published)
                                    <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">Terbit</span>
                                @else
                                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">Draf</span>
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-right text-sm">
                                @if ($article->is_published)
                                    <a href="{{ route('warta.show', $article->slug) }}" target="_blank" rel="noopener"
                                       class="mr-3 font-semibold text-primary hover:text-blue-800">Lihat</a>
                                @endif
                                <a href="{{ route('admin.warta.edit', $article) }}"
                                   class="mr-3 font-semibold text-amber-600 hover:text-amber-800">Edit</a>
                                <form method="POST" action="{{ route('admin.warta.destroy', $article) }}" class="inline"
                                      onsubmit="return confirm('Hapus warta ini beserta seluruh lampirannya?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-semibold text-red-600 hover:text-red-800">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-14 text-center">
                                <p class="font-serif text-xl font-bold text-slate-800">Belum ada warta</p>
                                <p class="mt-2 text-sm text-slate-500">Tambahkan warta pertama untuk mulai mengisi website.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($articles->hasPages())
            <div class="border-t border-slate-200 px-6 py-4">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
@endsection
