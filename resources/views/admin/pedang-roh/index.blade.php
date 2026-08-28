@extends('layouts.admin')

@section('page-title', 'Kelola Pedang Roh')

@section('content')
    <div class="mb-7 flex flex-wrap items-center justify-between gap-4">
        <div>
            <p class="text-sm font-semibold uppercase tracking-wider text-primary">Majalah Rohani</p>
            <h1 class="mt-1 font-serif text-3xl font-bold text-slate-900">Pedang Roh</h1>
            <p class="mt-2 text-slate-600">Kelola edisi majalah dan berkas PDF yang tersedia bagi jemaat.</p>
        </div>
        <a href="{{ route('admin.pedang-roh.create') }}"
           class="rounded-lg bg-primary px-5 py-3 font-semibold text-white shadow-sm hover:bg-blue-800 transition">
            + Unggah Majalah
        </a>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                        <th class="px-6 py-4">Majalah</th>
                        <th class="px-6 py-4">Edisi</th>
                        <th class="px-6 py-4">Tanggal Terbit</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse ($magazines as $magazine)
                        <tr class="align-middle">
                            <td class="px-6 py-4">
                                <div class="flex min-w-64 items-center gap-4">
                                    @if ($magazine->cover_image)
                                        <img src="{{ asset('storage/' . $magazine->cover_image) }}" alt="" loading="lazy" decoding="async"
                                             class="h-20 w-14 shrink-0 rounded-md object-cover shadow-sm">
                                    @else
                                        <div class="h-20 w-14 shrink-0 rounded-md bg-gradient-to-br from-blue-950 to-primary flex items-center justify-center px-1 text-center text-[10px] font-bold text-white shadow-sm">
                                            PEDANG ROH
                                        </div>
                                    @endif
                                    <p class="font-semibold text-slate-900">{{ $magazine->title }}</p>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm font-semibold text-slate-700">
                                {{ $magazine->edition_label }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-600">
                                {{ $magazine->publish_date->translatedFormat('d F Y') }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-right text-sm">
                                <a href="{{ route('pedang-roh.view', $magazine) }}" target="_blank" rel="noopener"
                                   class="mr-3 font-semibold text-primary hover:text-blue-800">Baca</a>
                                <a href="{{ route('pedang-roh.download', $magazine) }}"
                                   class="mr-3 font-semibold text-slate-600 hover:text-slate-900">Unduh</a>
                                <a href="{{ route('admin.pedang-roh.edit', $magazine) }}"
                                   class="mr-3 font-semibold text-amber-600 hover:text-amber-800">Edit</a>
                                <form method="POST" action="{{ route('admin.pedang-roh.destroy', $magazine) }}" class="inline"
                                      onsubmit="return confirm('Hapus majalah ini beserta berkas PDF dan sampulnya?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-semibold text-red-600 hover:text-red-800">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-14 text-center">
                                <p class="font-serif text-xl font-bold text-slate-800">Belum ada majalah</p>
                                <p class="mt-2 text-sm text-slate-500">Unggah edisi Pedang Roh pertama untuk ditampilkan di website.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($magazines->hasPages())
            <div class="border-t border-slate-200 px-6 py-4">
                {{ $magazines->links() }}
            </div>
        @endif
    </div>
@endsection
