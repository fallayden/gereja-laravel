@extends('layouts.app')

@section('content')
    <section class="relative overflow-hidden bg-blue-950 text-white">
        <img
            src="{{ asset('images/foto-tentang.jpeg') }}"
            alt=""
            class="absolute inset-0 h-full w-full object-cover object-center"
            aria-hidden="true"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-blue-950/95 via-blue-950/80 to-slate-950/45"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
            <h1 class="mt-3 max-w-4xl font-serif text-4xl font-bold leading-tight sm:text-5xl">
                Mengenal GBIA GRAMMATA
            </h1>
            <p class="mt-5 max-w-3xl text-lg leading-relaxed text-blue-100 sm:text-xl">
                Tiang penopang dan dasar kebenaran di Serpong, Tangerang. Berpusat pada Kristus dan
                berorientasi pada keluarga.
            </p>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-10 lg:grid-cols-12 lg:gap-12">
                <div class="lg:col-span-5">
                    <figure class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl">
                        <img
                            src="{{ asset('images/gembala.jpg') }}"
                            alt="Gbl. Arifan T. Kusuma"
                            loading="lazy"
                            decoding="async"
                            class="max-h-[500px] w-full object-cover object-center"
                        >
                        <figcaption class="border-t border-slate-200 px-5 py-4 text-center">
                            <p class="font-serif font-bold text-slate-900">Gbl. Arifan T. Kusuma</p>
                        </figcaption>
                    </figure>
                </div>

                <div class="lg:col-span-7">
                    <h2 class="mt-2 font-serif text-3xl font-bold leading-tight text-slate-900 sm:text-4xl">
                        Selamat Datang di GBIA GRAMMATA
                    </h2>

                    <div class="mt-6 space-y-5 leading-8 text-slate-600">
                        <p>
                            Saya, Gbl. Arifan T. Kusuma, ingin menyampaikan sambutan hangat kepada Anda.
                            Terima kasih telah mengunjungi situs web GBIA Grammata. Kami dengan senang hati
                            menyambut Anda untuk menghadiri kebaktian kami dan melayani Tuhan bersama-sama.
                        </p>
                        <p>
                            Jika Anda mencari gereja untuk melakukan pekerjaan Tuhan dengan cara Tuhan,
                            inilah tempatnya. Silakan amati dan dengarkan hal-hal yang kami lakukan dan ajarkan
                            dalam Gereja ini. Jangan terburu-buru menolak dan juga jangan terburu-buru menerima.
                            Gereja kami adalah pelayanan yang berpusat pada Kristus dan berorientasi pada
                            keluarga. Kami ingin Anda merasa betah selama kunjungan Anda.
                        </p>
                        <p>
                            Kami doakan kiranya puji-pujian, persekutuan, dan pemberitaan Firman Tuhan dapat
                            menjadi berkat rohani dalam kehidupan Anda. Jika Anda berdomisili di wilayah
                            Serpong, Tangerang, dan sekitarnya, kami menyampaikan undangan yang tulus untuk
                            menjadikan GBIA Grammata sebagai tempat Anda untuk bertumbuh dan melayani.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="bg-slate-50 py-16 lg:py-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <h2 class="mt-2 font-serif text-3xl font-bold text-slate-900 sm:text-4xl">Perjalanan Sejarah Gereja</h2>
                <p class="mt-4 text-lg leading-relaxed text-slate-600">
                    Jejak langkah penyertaan Tuhan bagi GBIA GRAMMATA dari awal berdirinya hingga saat ini
                </p>
            </div>

            <div class="relative mt-12 space-y-6 before:absolute before:bottom-5 before:left-[2.45rem] before:top-5 before:w-px before:bg-blue-200 sm:before:left-[3.45rem]">
                <article class="relative grid grid-cols-[80px_minmax(0,1fr)] items-start gap-4 sm:grid-cols-[112px_minmax(0,1fr)] sm:gap-6">
                    <div class="relative z-10 rounded-lg bg-primary px-3 py-2 text-center font-bold text-white shadow-sm">2000</div>
                    <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                        <h3 class="font-serif text-xl font-bold text-slate-900">Kebaktian Perdana</h3>
                        <p class="mt-3 leading-relaxed text-slate-600">Kebaktian perdana GBIA Grammata dimulai di lantai dua sebuah salon di Gading Serpong. GBIA Graphe mengutus Bpk. Timmy sebagai penanggung jawab.</p>
                    </div>
                </article>

                <article class="relative grid grid-cols-[80px_minmax(0,1fr)] items-start gap-4 sm:grid-cols-[112px_minmax(0,1fr)] sm:gap-6">
                    <div class="relative z-10 rounded-lg bg-primary px-3 py-2 text-center font-bold text-white shadow-sm">2001</div>
                    <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                        <h3 class="font-serif text-xl font-bold text-slate-900">Pergantian Penanggung Jawab &amp; Pindah Ruko</h3>
                        <p class="mt-3 leading-relaxed text-slate-600">Ev. Firman Legowo ditunjuk untuk menggantikan Bpk. Timmy. Lokasi kebaktian pindah ke ruko blok AD, Gading Serpong.</p>
                    </div>
                </article>

                <article class="relative grid grid-cols-[80px_minmax(0,1fr)] items-start gap-4 sm:grid-cols-[112px_minmax(0,1fr)] sm:gap-6">
                    <div class="relative z-10 rounded-lg bg-primary px-3 py-2 text-center font-bold text-white shadow-sm">2003</div>
                    <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                        <h3 class="font-serif text-xl font-bold text-slate-900">Estafet Penggembalaan</h3>
                        <p class="mt-3 leading-relaxed text-slate-600">Penggembalaan dipercayakan kepada Ev. Chi Jun Pin setelah Ev. Firman merintis di tempat lain. Kebaktian sempat berpindah ke ruko milik jemaat (Ibu Lie Ester) di blok AH.</p>
                    </div>
                </article>

                <article class="relative grid grid-cols-[80px_minmax(0,1fr)] items-start gap-4 sm:grid-cols-[112px_minmax(0,1fr)] sm:gap-6">
                    <div class="relative z-10 rounded-lg bg-primary px-3 py-2 text-center font-bold text-white shadow-sm">2004</div>
                    <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                        <h3 class="font-serif text-xl font-bold text-slate-900">Awal Pelayanan Sdr. Arifan T. Kusuma</h3>
                        <p class="mt-3 leading-relaxed text-slate-600">Ev. Chi Jun Pin pergi ke Brastagi untuk merintis jemaat. Penggembalaan kemudian dipercayakan kepada Sdr. Arifan T. Kusuma, yang saat itu masih menjadi mahasiswa senior di STT Graphe.</p>
                    </div>
                </article>

                <article class="relative grid grid-cols-[80px_minmax(0,1fr)] items-start gap-4 sm:grid-cols-[112px_minmax(0,1fr)] sm:gap-6">
                    <div class="relative z-10 rounded-lg bg-primary px-3 py-2 text-center font-bold text-white shadow-sm">2005</div>
                    <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                        <h3 class="font-serif text-xl font-bold text-slate-900">Penahbisan Penginjil</h3>
                        <p class="mt-3 leading-relaxed text-slate-600">Sdr. Arifan ditahbiskan sebagai penginjil GBIA Graphe untuk melayani tugas penggembalaan di GBIA Grammata. Tempat kebaktian berpindah kembali ke ruko blok AA, Gading Serpong.</p>
                    </div>
                </article>

                <article class="relative grid grid-cols-[80px_minmax(0,1fr)] items-start gap-4 sm:grid-cols-[112px_minmax(0,1fr)] sm:gap-6">
                    <div class="relative z-10 rounded-lg bg-primary px-3 py-2 text-center font-bold text-white shadow-sm">2012</div>
                    <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                        <h3 class="font-serif text-xl font-bold text-slate-900">Jemaat Independen &amp; Lokasi Santa Monica hingga Sekarang</h3>
                        <p class="mt-3 leading-relaxed text-slate-600">Ev. Arifan ditahbiskan menjadi gembala jemaat, dan GBIA Grammata resmi menjadi jemaat yang independen. Tempat kebaktian menetap di Ruko Santa Monica blok A No. 3, yang terus menjadi tempat pertemuan jemaat hingga saat ini.</p>
                    </div>
                </article>

                <div class="relative grid grid-cols-[80px_minmax(0,1fr)] items-start gap-4 sm:grid-cols-[112px_minmax(0,1fr)] sm:gap-6">
                    <div class="relative z-10 rounded-lg bg-primary px-3 py-2 text-center font-bold text-white shadow-sm">Sekarang</div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <h2 class="mt-2 font-serif text-3xl font-bold text-slate-900 sm:text-4xl">Tunas Jemaat</h2>
                <p class="mt-4 text-lg leading-relaxed text-slate-600">Cabang dan pos pelayanan jemaat di bawah naungan GBIA GRAMMATA</p>
            </div>

            <div class="mt-10 grid gap-8 md:grid-cols-3">
                <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                    <img src="{{ asset('images/Tanjung Burung.jpeg') }}" alt="Pelayanan GBIA Tanjung Burung" loading="lazy" decoding="async" class="h-52 w-full object-cover object-center">
                    <div class="p-6">
                        <h3 class="font-serif text-xl font-bold text-slate-900">GBIA Tanjung Burung</h3>
                        <dl class="mt-5 space-y-3 text-sm">
                            <div><dt class="text-slate-500">Pelayan</dt><dd class="mt-1 font-semibold text-slate-800">EV. Akonius</dd></div>
                            <div><dt class="text-slate-500">Lokasi</dt><dd class="mt-1 font-semibold text-slate-800">Tanjung Burung, Kab Tangerang</dd></div>
                        </dl>
                    </div>
                </article>

                <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                    <img src="{{ asset('images/Sepatan.jpeg') }}" alt="Pelayanan GBIA Musafir" loading="lazy" decoding="async" class="h-52 w-full object-cover object-center">
                    <div class="p-6">
                        <h3 class="font-serif text-xl font-bold text-slate-900">GBIA Musafir</h3>
                        <dl class="mt-5 space-y-3 text-sm">
                            <div><dt class="text-slate-500">Pelayan</dt><dd class="mt-1 font-semibold text-slate-800">Ev. Servantius Lase</dd></div>
                            <div><dt class="text-slate-500">Lokasi</dt><dd class="mt-1 font-semibold text-slate-800">Sepatan, Kab. Tangerang</dd></div>
                        </dl>
                    </div>
                </article>

                <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                    <img src="{{ asset('images/citra.jpeg') }}" alt="Pelayanan GBIA Citra Raya" loading="lazy" decoding="async" class="h-52 w-full object-cover object-center">
                    <div class="p-6">
                        <h3 class="font-serif text-xl font-bold text-slate-900">GBIA Citra Raya</h3>
                        <dl class="mt-5 space-y-3 text-sm">
                            <div><dt class="text-slate-500">Pelayan</dt><dd class="mt-1 font-semibold text-slate-800">GI. Oka Bagas</dd></div>
                            <div><dt class="text-slate-500">Lokasi</dt><dd class="mt-1 font-semibold text-slate-800">Citra Raya, Cikupa, Tangerang</dd></div>
                        </dl>
                    </div>
                </article>
            </div>
        </div>
    </section>
@endsection
