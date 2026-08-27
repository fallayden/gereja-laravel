<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin — GBIA GRAMMATA</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Merriweather:wght@700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1E3A8A',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Merriweather', 'serif'],
                    },
                },
            },
        };
    </script>
</head>
<body class="min-h-screen bg-slate-100 font-sans text-slate-800">
    <main class="min-h-screen grid lg:grid-cols-2">
        <section class="hidden lg:flex relative overflow-hidden bg-gradient-to-br from-blue-950 via-primary to-blue-700 p-12 text-white">
            <div class="absolute inset-0 opacity-10"
                 style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 30px 30px;"></div>
            <div class="relative z-10 flex h-full flex-col justify-between max-w-xl">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 self-start">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Logo GBIA GRAMMATA"
                         class="h-12 w-12 rounded-full border border-white/30 object-cover">
                    <div>
                        <p class="font-serif text-xl font-bold">GBIA GRAMMATA</p>
                        <p class="text-xs uppercase tracking-wider text-blue-200">Panel Administrasi</p>
                    </div>
                </a>

                <div class="py-16">
                    <p class="font-serif text-4xl font-bold leading-tight">Kelola pelayanan digital gereja dalam satu tempat.</p>
                    <p class="mt-5 text-lg leading-relaxed text-blue-100">
                        Publikasikan Warta Jemaat dan majalah Pedang Roh agar informasi dapat diterima jemaat dengan mudah.
                    </p>
                </div>

                <p class="text-sm text-blue-200">&copy; {{ date('Y') }} GBIA GRAMMATA</p>
            </div>
        </section>

        <section class="flex items-center justify-center px-5 py-12 sm:px-8">
            <div class="w-full max-w-md">
                <a href="{{ route('home') }}" class="mb-10 inline-flex items-center gap-3 lg:hidden">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Logo GBIA GRAMMATA"
                         class="h-11 w-11 rounded-full object-cover">
                    <span class="font-serif text-lg font-bold text-primary">GBIA GRAMMATA</span>
                </a>

                <div class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm sm:p-9">
                    <p class="text-sm font-semibold uppercase tracking-wider text-primary">Area khusus pengelola</p>
                    <h1 class="mt-2 font-serif text-3xl font-bold text-slate-900">Login Admin</h1>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">
                        Masukkan akun administrator untuk melanjutkan.
                    </p>

                    @if ($errors->any())
                        <div role="alert" class="mt-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.post') }}" class="mt-7 space-y-5">
                        @csrf

                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-700">Email</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                autocomplete="email"
                                required
                                autofocus
                                class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-primary focus:ring-2 focus:ring-blue-100"
                                placeholder="admin@example.com"
                            >
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-semibold text-slate-700">Kata sandi</label>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                autocomplete="current-password"
                                required
                                class="mt-2 w-full rounded-lg border border-slate-300 px-4 py-3 text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-primary focus:ring-2 focus:ring-blue-100"
                                placeholder="Masukkan kata sandi"
                            >
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                                class="w-full rounded-lg bg-primary px-5 py-3 font-semibold text-white transition hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                            Masuk
                        </button>
                    </form>

                    <a href="{{ route('home') }}" class="mt-6 block text-center text-sm font-semibold text-slate-500 hover:text-primary">
                        Kembali ke website
                    </a>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
