@extends('layouts.app')

@section('content')
    <section class="bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
            <p class="text-blue-200 text-sm font-semibold uppercase tracking-wider">Mengenal kami</p>
            <h1 class="font-serif text-4xl sm:text-5xl font-bold mt-2">Tentang GBIA GRAMMATA</h1>
            <p class="mt-5 max-w-3xl text-lg leading-relaxed text-blue-100">
                Gereja Baptis Independen Alkitabiah yang hadir untuk memberitakan firman Tuhan,
                membangun persekutuan, dan melayani sesama.
            </p>
        </div>
    </section>

    <section class="py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="text-primary text-sm font-semibold uppercase tracking-wider">Siapa kami</p>
                    <h2 class="font-serif text-3xl font-bold text-slate-900 mt-2">Bertumbuh bersama dalam Kristus</h2>
                    <div class="mt-5 space-y-4 text-slate-600 leading-relaxed">
                        <p>
                            GBIA GRAMMATA adalah komunitas orang percaya yang berkomitmen menjadikan
                            Alkitab sebagai dasar iman dan kehidupan sehari-hari.
                        </p>
                        <p>
                            Melalui ibadah, pengajaran, persekutuan, dan pelayanan, kami rindu setiap
                            jemaat semakin mengenal Tuhan serta menjadi berkat bagi keluarga dan masyarakat.
                        </p>
                    </div>
                </div>

                <div class="rounded-2xl bg-gradient-to-br from-blue-950 to-primary p-8 sm:p-10 text-white shadow-lg">
                    <p class="font-serif text-2xl font-bold">Kasih, Firman, dan Pelayanan</p>
                    <p class="mt-4 leading-relaxed text-blue-100">
                        Kami percaya gereja adalah keluarga yang saling menguatkan, bertumbuh melalui
                        kebenaran firman Tuhan, dan melayani dengan kasih.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-slate-200 bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 md:grid-cols-3">
                <article class="rounded-xl border border-slate-200 p-6">
                    <h2 class="font-serif text-xl font-bold text-slate-900">Berpusat pada Firman</h2>
                    <p class="mt-3 text-slate-600 leading-relaxed">
                        Alkitab menjadi dasar pengajaran, pertumbuhan rohani, dan keputusan hidup kami.
                    </p>
                </article>
                <article class="rounded-xl border border-slate-200 p-6">
                    <h2 class="font-serif text-xl font-bold text-slate-900">Hidup dalam Persekutuan</h2>
                    <p class="mt-3 text-slate-600 leading-relaxed">
                        Kami saling menerima, memperhatikan, dan menguatkan sebagai satu keluarga iman.
                    </p>
                </article>
                <article class="rounded-xl border border-slate-200 p-6">
                    <h2 class="font-serif text-xl font-bold text-slate-900">Hadir untuk Melayani</h2>
                    <p class="mt-3 text-slate-600 leading-relaxed">
                        Iman diwujudkan melalui pelayanan yang tulus kepada gereja dan masyarakat.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <section class="py-16 text-center">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="font-serif text-3xl font-bold text-slate-900">Mari beribadah bersama</h2>
            <p class="mt-3 text-slate-600">
                Kami menyambut Anda dan keluarga untuk mengenal Tuhan dan bertumbuh bersama kami.
            </p>
            <a href="{{ route('home') }}"
               class="inline-flex mt-7 rounded-lg bg-primary px-5 py-3 font-semibold text-white hover:bg-blue-800 transition">
                Lihat Jadwal Ibadah
            </a>
        </div>
    </section>
@endsection
