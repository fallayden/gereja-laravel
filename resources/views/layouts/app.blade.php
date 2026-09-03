<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle ?? 'GBIA GRAMMATA' }} — Website Gereja</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS dimuat melalui CDN. -->
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

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="hover:text-blue-200 transition {{ request()->routeIs('home') ? 'font-bold border-b-2 border-white' : '' }}">Beranda</a>
                <a href="{{ route('about') }}" class="hover:text-blue-200 transition {{ request()->routeIs('about') ? 'font-bold border-b-2 border-white' : '' }}">Tentang Kami</a>
                <a href="{{ route('warta.index') }}" class="hover:text-blue-200 transition {{ request()->routeIs('warta.*') ? 'font-bold border-b-2 border-white' : '' }}">Warta Jemaat</a>
                <a href="{{ route('pedang-roh.index') }}" class="hover:text-blue-200 transition {{ request()->routeIs('pedang-roh.*') ? 'font-bold border-b-2 border-white' : '' }}">Pedang Roh</a>
                <a href="{{ route('login') }}" class="bg-white text-primary px-3 py-1.5 rounded text-sm font-semibold hover:bg-blue-50 transition">Admin</a>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="flex items-center md:hidden">
                <button id="mobile-menu-button" type="button" aria-expanded="false" aria-controls="mobile-menu" aria-label="Buka menu navigasi"
                        class="p-2 rounded-lg text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-white transition">
                    <!-- Icon Hamburger (3 garis) -->
                    <svg id="menu-icon-open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon Close (Silang) -->
                    <svg id="menu-icon-close" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Panel -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-blue-800 bg-blue-950/95 backdrop-blur-md px-4 pt-3 pb-5 space-y-2 shadow-xl">
            <a href="{{ route('home') }}"
               class="block px-3 py-2.5 rounded-lg text-base font-medium transition {{ request()->routeIs('home') ? 'bg-blue-800 text-white font-bold' : 'text-blue-100 hover:bg-blue-800/60 hover:text-white' }}">
                Beranda
            </a>
            <a href="{{ route('about') }}"
               class="block px-3 py-2.5 rounded-lg text-base font-medium transition {{ request()->routeIs('about') ? 'bg-blue-800 text-white font-bold' : 'text-blue-100 hover:bg-blue-800/60 hover:text-white' }}">
                Tentang Kami
            </a>
            <a href="{{ route('warta.index') }}"
               class="block px-3 py-2.5 rounded-lg text-base font-medium transition {{ request()->routeIs('warta.*') ? 'bg-blue-800 text-white font-bold' : 'text-blue-100 hover:bg-blue-800/60 hover:text-white' }}">
                Warta Jemaat
            </a>
            <a href="{{ route('pedang-roh.index') }}"
               class="block px-3 py-2.5 rounded-lg text-base font-medium transition {{ request()->routeIs('pedang-roh.*') ? 'bg-blue-800 text-white font-bold' : 'text-blue-100 hover:bg-blue-800/60 hover:text-white' }}">
                Pedang Roh
            </a>
            <div class="pt-2 border-t border-blue-900">
                <a href="{{ route('login') }}"
                   class="block w-full text-center bg-white text-primary px-4 py-2.5 rounded-lg text-base font-semibold hover:bg-blue-50 transition shadow-sm">
                    Panel Admin
                </a>
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

    <!-- Mobile Menu Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const button = document.getElementById('mobile-menu-button');
            const menu = document.getElementById('mobile-menu');
            const iconOpen = document.getElementById('menu-icon-open');
            const iconClose = document.getElementById('menu-icon-close');

            if (!button || !menu) return;

            function toggleMenu() {
                const isExpanded = button.getAttribute('aria-expanded') === 'true';
                button.setAttribute('aria-expanded', !isExpanded);
                menu.classList.toggle('hidden');
                iconOpen.classList.toggle('hidden');
                iconClose.classList.toggle('hidden');
            }

            button.addEventListener('click', function (e) {
                e.stopPropagation();
                toggleMenu();
            });

            // Close menu if clicked outside
            document.addEventListener('click', function (e) {
                if (!menu.classList.contains('hidden') && !menu.contains(e.target) && !button.contains(e.target)) {
                    toggleMenu();
                }
            });

            // Close menu on Escape key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && !menu.classList.contains('hidden')) {
                    toggleMenu();
                }
            });
        });
    </script>
</body>
</html>
