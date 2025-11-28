<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - IndoWhatCRM</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Custom scrollbar for sidebar */
        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar-scroll::-webkit-scrollbar-track {
            background: transparent;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.2);
            border-radius: 4px;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb:hover {
            background: rgba(255,255,255,0.3);
        }
    </style>
</head>
<body class="font-sans antialiased bg-wa-light-gray">
    <div class="min-h-screen flex">
        <!-- Mobile Overlay -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden" onclick="toggleSidebar()"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="fixed lg:sticky top-0 left-0 z-50 h-screen w-64 bg-wa-secondary transform -translate-x-full lg:translate-x-0 transition-transform duration-300 flex flex-col">
            <!-- Logo -->
            <div class="p-4 border-b border-white/10">
                <a href="/" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-wa-primary rounded-xl flex items-center justify-center">
                        <i class="fa-brands fa-whatsapp text-white text-xl"></i>
                    </div>
                    <span class="text-xl font-bold text-white">IndoWhatCRM</span>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 space-y-1 overflow-y-auto sidebar-scroll">
                <a href="{{ route('panel.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:bg-white/10 hover:text-white transition-all {{ request()->routeIs('panel.dashboard') ? 'bg-white/10 text-white' : '' }}">
                    <i class="fa-solid fa-gauge-high w-5 text-center"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('panel.devices') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:bg-white/10 hover:text-white transition-all {{ request()->routeIs('panel.devices') ? 'bg-white/10 text-white' : '' }}">
                    <i class="fa-solid fa-mobile-screen w-5 text-center"></i>
                    <span>Devices</span>
                </a>
                <a href="{{ route('panel.contacts') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:bg-white/10 hover:text-white transition-all {{ request()->routeIs('panel.contacts') ? 'bg-white/10 text-white' : '' }}">
                    <i class="fa-solid fa-address-book w-5 text-center"></i>
                    <span>Kontak</span>
                </a>
                <a href="{{ route('panel.chats') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:bg-white/10 hover:text-white transition-all {{ request()->routeIs('panel.chats') ? 'bg-white/10 text-white' : '' }}">
                    <i class="fa-solid fa-comments w-5 text-center"></i>
                    <span>Chat</span>
                    <span class="ml-auto bg-wa-primary text-white text-xs px-2 py-0.5 rounded-full">12</span>
                </a>
                <a href="{{ route('panel.broadcast') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:bg-white/10 hover:text-white transition-all {{ request()->routeIs('panel.broadcast') ? 'bg-white/10 text-white' : '' }}">
                    <i class="fa-solid fa-paper-plane w-5 text-center"></i>
                    <span>Broadcast</span>
                </a>
                <a href="{{ route('panel.autoreply') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:bg-white/10 hover:text-white transition-all {{ request()->routeIs('panel.autoreply') ? 'bg-white/10 text-white' : '' }}">
                    <i class="fa-solid fa-robot w-5 text-center"></i>
                    <span>Auto Reply</span>
                </a>

                <div class="pt-4 mt-4 border-t border-white/10">
                    <p class="px-4 text-xs text-white/40 uppercase tracking-wider mb-2">Pengaturan</p>
                    <a href="{{ route('panel.settings') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:bg-white/10 hover:text-white transition-all {{ request()->routeIs('panel.settings') ? 'bg-white/10 text-white' : '' }}">
                        <i class="fa-solid fa-gear w-5 text-center"></i>
                        <span>Pengaturan</span>
                    </a>
                    <a href="{{ route('panel.api') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-white/80 hover:bg-white/10 hover:text-white transition-all {{ request()->routeIs('panel.api') ? 'bg-white/10 text-white' : '' }}">
                        <i class="fa-solid fa-code w-5 text-center"></i>
                        <span>API</span>
                    </a>
                </div>
            </nav>

            <!-- User Profile -->
            <div class="p-4 border-t border-white/10">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-wa-primary rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold">{{ substr(Auth::user()->name ?? 'U', 0, 1) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-white font-medium truncate">{{ Auth::user()->name ?? 'User' }}</p>
                        <p class="text-white/60 text-xs truncate">{{ Auth::user()->email ?? 'user@email.com' }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="p-2 text-white/60 hover:text-white hover:bg-white/10 rounded-lg transition-all" title="Logout">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-h-screen">
            <!-- Top Header (Mobile) -->
            <header class="lg:hidden sticky top-0 z-30 bg-white border-b border-gray-200 px-4 py-3 flex items-center gap-4">
                <button onclick="toggleSidebar()" class="p-2 -ml-2 text-wa-dark hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-wa-primary rounded-lg flex items-center justify-center">
                        <i class="fa-brands fa-whatsapp text-white"></i>
                    </div>
                    <span class="font-bold text-wa-secondary">IndoWhatCRM</span>
                </div>
            </header>

            <!-- Page Header -->
            <div class="bg-white border-b border-gray-200 px-4 lg:px-8 py-4 lg:py-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-xl lg:text-2xl font-bold text-wa-dark">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-wa-gray text-sm mt-1">@yield('page-description', 'Selamat datang di panel IndoWhatCRM')</p>
                    </div>
                    @yield('page-actions')
                </div>
            </div>

            <!-- Page Content -->
            <main class="flex-1 p-4 lg:p-8">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 px-4 lg:px-8 py-4">
                <p class="text-center text-sm text-wa-gray">
                    &copy; {{ date('Y') }} IndoWhatCRM. All rights reserved.
                </p>
            </footer>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Close sidebar on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebarOverlay');
                
                if (!sidebar.classList.contains('-translate-x-full')) {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                }
            }
        });
    </script>

    @stack('scripts')
</body>
</html>

