@extends('layouts.app')

@section('content')
    <section class="relative overflow-hidden bg-blue-950 text-white">
        <img
            src="{{ asset('images/foto-beranda.jpg') }}"
            alt=""
            class="absolute inset-0 h-full w-full object-cover object-center"
            aria-hidden="true"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-blue-950/95 via-blue-950/75 to-slate-950/35"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-24 lg:py-32">
            <div class="max-w-4xl">
                <p class="mb-5 text-sm font-semibold uppercase tracking-[0.22em] text-blue-200">
                    Gereja Baptis Independen Alkitabiah
                </p>
                <h1 class="font-serif text-4xl font-bold leading-tight sm:text-5xl lg:text-6xl">
                    Selamat Datang di GBIA GRAMMATA
                </h1>
                <p class="mt-6 max-w-3xl text-lg leading-relaxed text-blue-100 sm:text-xl">
                    Menjadi tiang penopang dan dasar kebenaran di daerah Serpong, mempersiapkan umat
                    yang mengasihi, bertumbuh, dan melayani Tuhan.
                </p>
            </div>
        </div>
    </section>

    <section id="jadwal-ibadah" class="scroll-mt-24 bg-slate-50 py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-auto mb-10 max-w-3xl text-center">
                <h2 class="mt-2 font-serif text-3xl font-bold text-slate-900 sm:text-4xl">Jadwal Ibadah &amp; Persekutuan</h2>
                <p class="mt-4 text-lg text-slate-600">Mari bergabung dan beribadah bersama jemaat GBIA GRAMMATA</p>
            </div>

            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @forelse ($schedules as $schedule)
                    <article class="group rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-blue-200 hover:shadow-md">
                        <p class="text-sm font-semibold uppercase tracking-wider text-primary">{{ $schedule['day'] }}</p>
                        <h3 class="mt-2 font-serif text-xl font-bold text-slate-900">{{ $schedule['name'] }}</h3>
                        <dl class="mt-5 space-y-4 text-sm">
                            <div>
                                <dt class="text-slate-500">Waktu</dt>
                                <dd class="mt-1 font-semibold text-slate-800">{{ $schedule['time'] }}</dd>
                            </div>
                            <div>
                                <dt class="text-slate-500">Lokasi</dt>
                                <dd class="mt-1 font-semibold text-slate-800">{{ $schedule['location'] }}</dd>
                            </div>
                        </dl>
                    </article>
                @empty
                    <div class="rounded-xl border border-dashed border-slate-300 bg-white p-10 text-center sm:col-span-2 lg:col-span-4">
                        <h3 class="font-serif text-xl font-bold text-slate-800">Jadwal belum tersedia</h3>
                        <p class="mt-2 text-slate-600">Informasi jadwal ibadah akan segera diperbarui.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-auto mb-10 max-w-3xl text-center">                
                <h2 class="mt-2 font-serif text-3xl font-bold text-slate-900 sm:text-4xl">Mengenal GBIA GRAMMATA</h2>
                <p class="mt-4 text-lg text-slate-600">Bertumbuh dalam kebenaran, menjangkau sesama, dan melayani Tuhan bersama-sama.</p>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                <article class="rounded-2xl border border-slate-200 bg-slate-50 p-7 shadow-sm">
                    <h3 class="font-serif text-2xl font-bold text-slate-900">Visi Kami</h3>
                    <p class="mt-4 leading-relaxed text-slate-600">
                        Hadir untuk menjadi terang dunia dan tiang penopang dasar kebenaran, mempersiapkan
                        umat yg mengasihi, bertumbuh, dan melayani TUHAN.
                    </p>
                </article>

                <article class="rounded-2xl border border-slate-200 bg-slate-50 p-7 shadow-sm">
                    <h3 class="font-serif text-2xl font-bold text-slate-900">Misi Kami</h3>
                    <p class="mt-4 leading-relaxed text-slate-600">
                        Menjangkau melalui internet, memfasilitasi untuk memenuhi kebutuhan umat TUHAN
                        melalui internet.
                    </p>
                </article>

                <article class="rounded-2xl border border-slate-200 bg-slate-50 p-7 shadow-sm">
                    <h3 class="font-serif text-2xl font-bold text-slate-900">Tentang Gereja</h3>
                    <p class="mt-4 leading-relaxed text-slate-600">
                        Kata ‘GRAMMATA’ sendiri adalah berarti Kitab Suci (2 Tim 3:15). Kami hadir untuk
                        Anda di daerah Serpong, Tangerang sebagai tiang penopang dan dasar kebenaran di
                        daerah Serpong sana.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <section class="bg-slate-50 py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <h2 class="mt-2 font-serif text-3xl font-bold text-slate-900 sm:text-4xl">Mari Bertumbuh dan Beribadah Bersama Kami</h2>
                <p class="mt-4 text-lg leading-relaxed text-slate-600">
                    Kami menyambut Anda dengan hangat untuk menjadi bagian dari keluarga Allah di GBIA GRAMMATA.
                </p>
            </div>

            <div class="mt-12">
                <div class="mb-5 flex items-end justify-between gap-4">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wider text-primary">Lokasi Gereja</p>
                        <h3 class="mt-1 font-serif text-2xl font-bold text-slate-900">Temukan Kami</h3>
                    </div>
                    <a href="https://www.google.com/maps/search/?api=1&query=GBIA+Grammata" target="_blank" rel="noopener"
                       class="hidden text-sm font-semibold text-primary hover:text-blue-800 sm:inline-flex">Buka di Google Maps</a>
                </div>

                <div class="w-full overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-lg aspect-[16/9] max-h-[500px]">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.136426090889!2d106.6135027745852!3d-6.245746293742612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fc6d411623db%3A0xadf0c541a4ff09c1!2sGBIA%20Grammata!5e0!3m2!1sid!2sid!4v1787810639945!5m2!1sid!2sid"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="strict-origin-when-cross-origin"
                        title="Peta lokasi GBIA GRAMMATA">
                    </iframe>
                </div>

                <a href="https://www.google.com/maps/search/?api=1&query=GBIA+Grammata" target="_blank" rel="noopener"
                   class="mt-5 inline-flex text-sm font-semibold text-primary hover:text-blue-800 sm:hidden">Buka di Google Maps</a>
            </div>
        </div>
    </section>
@endsection
