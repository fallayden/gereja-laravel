<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page-title', 'Admin') — GBIA GRAMMATA</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Merriweather:wght@700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { primary: '#1E3A8A' },
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
    <header class="border-b border-slate-200 bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-18 py-3 flex flex-wrap items-center justify-between gap-4">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Logo GBIA GRAMMATA" class="h-11 w-11 rounded-full object-cover">
                <div>
                    <p class="font-serif font-bold text-primary">GBIA GRAMMATA</p>
                    <p class="text-xs uppercase tracking-wider text-slate-500">Panel Admin</p>
                </div>
            </a>

            <nav class="flex flex-wrap items-center gap-2 text-sm font-semibold">
                <a href="{{ route('admin.warta.index') }}"
                   class="rounded-lg px-3 py-2 {{ request()->routeIs('admin.warta.*') ? 'bg-blue-50 text-primary' : 'text-slate-600 hover:bg-slate-100' }}">
                    Warta Jemaat
                </a>
                <a href="{{ route('admin.pedang-roh.index') }}"
                   class="rounded-lg px-3 py-2 {{ request()->routeIs('admin.pedang-roh.*') ? 'bg-blue-50 text-primary' : 'text-slate-600 hover:bg-slate-100' }}">
                    Pedang Roh
                </a>
                <a href="{{ route('home') }}" target="_blank" rel="noopener" class="rounded-lg px-3 py-2 text-slate-600 hover:bg-slate-100">
                    Lihat Situs
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="rounded-lg bg-slate-900 px-3 py-2 text-white hover:bg-slate-700">Keluar</button>
                </form>
            </nav>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-10">
        @if (session('success'))
            <div role="status" class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
