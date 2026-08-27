<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'GBIA GRAMMATA' }} — Website Gereja</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (bisa via Vite @vite(...) atau CDN sederhana) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1E3A8A',
                        tertiary: '#DC2626',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Merriweather', 'serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans min-h-screen flex flex-col justify-between">

    <!-- NAVBAR -->
    <nav class="bg-primary text-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-20">
            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="w-10 h-10 rounded-full object-cover border border-white/20">
                <div>
                    <span class="font-serif font-bold text-xl block leading-tight">GBIA GRAMMATA</span>
                    <span class="text-xs text-blue-200 uppercase tracking-wider block">Gereja Baptis Independen Alkitabiah</span>
                </div>
            </a>
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="hover:text-blue-200 {{ request()->routeIs('home') ? 'font-bold border-b-2 border-white' : '' }}">Beranda</a>
                <a href="{{ route('about') }}" class="hover:text-blue-200 {{ request()->routeIs('about') ? 'font-bold border-b-2 border-white' : '' }}">Tentang Kami</a>
                <a href="{{ route('warta.index') }}" class="hover:text-blue-200 {{ request()->routeIs('warta.*') ? 'font-bold border-b-2 border-white' : '' }}">Warta Jemaat</a>
                <a href="{{ route('pedang-roh.index') }}" class="hover:text-blue-200 {{ request()->routeIs('pedang-roh.*') ? 'font-bold border-b-2 border-white' : '' }}">Pedang Roh</a>
                <a href="{{ route('login') }}" class="bg-white text-primary px-3 py-1.5 rounded text-sm font-semibold hover:bg-blue-50 transition">Admin</a>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-400 py-8 border-t border-slate-800 text-center text-sm">
        <p>&copy; {{ date('Y') }} GBIA GRAMMATA. Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>
