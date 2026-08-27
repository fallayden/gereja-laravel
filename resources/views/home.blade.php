@extends('layouts.app')

@section('content')
    <section class="bg-gradient-to-br from-blue-950 via-primary to-blue-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
            <div class="max-w-3xl">
                <p class="text-blue-200 font-semibold uppercase tracking-[0.2em] text-sm mb-4">
                    Selamat datang di
                </p>
                <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight">
                    GBIA GRAMMATA
                </h1>
                <p class="mt-5 text-lg sm:text-xl text-blue-100 leading-relaxed">
                    Gereja Baptis Independen Alkitabiah yang bertumbuh bersama dalam iman,
                    pengharapan, dan kasih.
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('about') }}"
                       class="inline-flex items-center rounded-lg bg-white px-5 py-3 font-semibold text-primary hover:bg-blue-50 transition">
                        Tentang Kami
                    </a>
                    <a href="{{ route('warta.index') }}"
                       class="inline-flex items-center rounded-lg border border-blue-300 px-5 py-3 font-semibold text-white hover:bg-white/10 transition">
                        Lihat Warta Jemaat
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mb-10">
                <p class="text-primary font-semibold uppercase tracking-wider text-sm">Bergabung bersama kami</p>
                <h2 class="font-serif text-3xl font-bold text-slate-900 mt-2">Jadwal Ibadah</h2>
                <p class="text-slate-600 mt-3">Kami menyambut Anda dan keluarga untuk beribadah bersama.</p>
            </div>

            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @forelse ($schedules as $schedule)
                    <article class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
                        <p class="text-sm font-semibold text-primary">{{ $schedule['day'] }}</p>
                        <h3 class="font-serif text-xl font-bold text-slate-900 mt-2">{{ $schedule['name'] }}</h3>
                        <dl class="mt-5 space-y-3 text-sm">
                            <div>
                                <dt class="text-slate-500">Waktu</dt>
                                <dd class="font-semibold text-slate-800 mt-0.5">{{ $schedule['time'] }}</dd>
                            </div>
                            <div>
                                <dt class="text-slate-500">Lokasi</dt>
                                <dd class="font-semibold text-slate-800 mt-0.5">{{ $schedule['location'] }}</dd>
                            </div>
                        </dl>
                    </article>
                @empty
                    <p class="text-slate-600 sm:col-span-2 lg:col-span-4">Jadwal ibadah belum tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
