<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Admin IndoWhatCRM</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .admin-sidebar::-webkit-scrollbar {
            width: 4px;
        }
        .admin-sidebar::-webkit-scrollbar-track {
            background: transparent;
        }
        .admin-sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.2);
            border-radius: 4px;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Mobile Overlay -->
        <div id="adminSidebarOverlay" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden" onclick="toggleAdminSidebar()"></div>

        <!-- Sidebar -->
        <aside id="adminSidebar" class="fixed lg:sticky top-0 left-0 z-50 h-screen w-72 bg-gray-900 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 flex flex-col">
            <!-- Logo -->
            <div class="p-5 border-b border-gray-800">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-shield-halved text-white"></i>
                    </div>
                    <div>
                        <span class="text-lg font-bold text-white">IndoWhatCRM</span>
                        <span class="block text-xs text-gray-500">Admin Panel</span>
                    </div>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 space-y-1 overflow-y-auto admin-sidebar">
                <!-- Main -->
                <p class="px-3 text-xs text-gray-500 uppercase tracking-wider mb-2">Main</p>
                
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fa-solid fa-gauge-high w-5 text-center"></i>
                    <span>Dashboard</span>
                </a>

                <!-- Users & Subscriptions -->
                <p class="px-3 text-xs text-gray-500 uppercase tracking-wider mt-6 mb-2">Users & Billing</p>
                
                <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-all {{ request()->routeIs('admin.users*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fa-solid fa-users w-5 text-center"></i>
                    <span>Users</span>
                    <span class="ml-auto bg-indigo-500 text-white text-xs px-2 py-0.5 rounded-full">156</span>
                </a>
                
                <a href="{{ route('admin.subscriptions') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-all {{ request()->routeIs('admin.subscriptions*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fa-solid fa-credit-card w-5 text-center"></i>
                    <span>Subscriptions</span>
                </a>
                
                <a href="{{ route('admin.plans') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-all {{ request()->routeIs('admin.plans*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fa-solid fa-tags w-5 text-center"></i>
                    <span>Plans & Pricing</span>
                </a>
                
                <a href="{{ route('admin.transactions') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-all {{ request()->routeIs('admin.transactions*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fa-solid fa-receipt w-5 text-center"></i>
                    <span>Transactions</span>
                </a>

                <!-- WhatsApp -->
                <p class="px-3 text-xs text-gray-500 uppercase tracking-wider mt-6 mb-2">WhatsApp</p>
                
                <a href="{{ route('admin.devices') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-all {{ request()->routeIs('admin.devices*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fa-solid fa-mobile-screen w-5 text-center"></i>
                    <span>All Devices</span>
                    <span class="ml-auto flex items-center gap-1">
                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                        <span class="text-xs text-gray-500">89</span>
                    </span>
                </a>
                
                <a href="{{ route('admin.messages') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-all {{ request()->routeIs('admin.messages*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fa-solid fa-comments w-5 text-center"></i>
                    <span>Messages Log</span>
                </a>
                
                <a href="{{ route('admin.broadcasts') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-all {{ request()->routeIs('admin.broadcasts*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fa-solid fa-paper-plane w-5 text-center"></i>
                    <span>Broadcasts</span>
                </a>

                <!-- System -->
                <p class="px-3 text-xs text-gray-500 uppercase tracking-wider mt-6 mb-2">System</p>
                
                <a href="{{ route('admin.servers') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-all {{ request()->routeIs('admin.servers*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fa-solid fa-server w-5 text-center"></i>
                    <span>Servers</span>
                </a>
                
                <a href="{{ route('admin.api-logs') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-all {{ request()->routeIs('admin.api-logs*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fa-solid fa-code w-5 text-center"></i>
                    <span>API Logs</span>
                </a>
                
                <a href="{{ route('admin.reports') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-all {{ request()->routeIs('admin.reports*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fa-solid fa-chart-bar w-5 text-center"></i>
                    <span>Reports</span>
                </a>
                
                <a href="{{ route('admin.settings') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-all {{ request()->routeIs('admin.settings*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fa-solid fa-gear w-5 text-center"></i>
                    <span>Settings</span>
                </a>
            </nav>

            <!-- Admin Profile -->
            <div class="p-4 border-t border-gray-800">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold">A</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-white font-medium truncate text-sm">Admin</p>
                        <p class="text-gray-500 text-xs truncate">Super Admin</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="p-2 text-gray-500 hover:text-white hover:bg-gray-800 rounded-lg transition-all" title="Logout">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-h-screen">
            <!-- Top Header -->
            <header class="sticky top-0 z-30 bg-white border-b border-gray-200 px-4 lg:px-6 py-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <button onclick="toggleAdminSidebar()" class="lg:hidden p-2 -ml-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                            <i class="fa-solid fa-bars text-xl"></i>
                        </button>
                        <div class="hidden sm:block">
                            <h1 class="text-lg font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                            <p class="text-sm text-gray-500">@yield('page-description', '')</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <!-- Search -->
                        <div class="hidden md:block relative">
                            <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Search..." class="w-64 pl-10 pr-4 py-2 bg-gray-100 border-0 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
                        </div>
                        
                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                            <i class="fa-solid fa-bell"></i>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        
                        <!-- Quick Actions -->
                        <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Mobile Title -->
            <div class="sm:hidden bg-white border-b border-gray-200 px-4 py-3">
                <h1 class="text-lg font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                <p class="text-sm text-gray-500">@yield('page-description', '')</p>
            </div>

            <!-- Page Content -->
            <main class="flex-1 p-4 lg:p-6">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 px-4 lg:px-6 py-4">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-2 text-sm text-gray-500">
                    <p>&copy; {{ date('Y') }} IndoWhatCRM. All rights reserved.</p>
                    <p>Version 1.0.0</p>
                </div>
            </footer>
        </div>
    </div>

    <script>
        function toggleAdminSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('adminSidebarOverlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const sidebar = document.getElementById('adminSidebar');
                const overlay = document.getElementById('adminSidebarOverlay');
                
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

