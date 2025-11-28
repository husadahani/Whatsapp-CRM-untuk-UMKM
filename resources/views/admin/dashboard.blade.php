@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Overview platform IndoWhatCRM')

@section('content')
<!-- Stats Row 1 -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-6">
    <!-- MRR -->
    <div class="bg-white rounded-xl p-5 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-dollar-sign text-green-600"></i>
            </div>
            <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">+12.5%</span>
        </div>
        <h3 class="text-2xl font-bold text-gray-900">Rp 45.8M</h3>
        <p class="text-sm text-gray-500">Monthly Revenue</p>
    </div>

    <!-- Total Users -->
    <div class="bg-white rounded-xl p-5 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-users text-indigo-600"></i>
            </div>
            <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">+23</span>
        </div>
        <h3 class="text-2xl font-bold text-gray-900">1,256</h3>
        <p class="text-sm text-gray-500">Total Users</p>
    </div>

    <!-- Active Devices -->
    <div class="bg-white rounded-xl p-5 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-mobile-screen text-purple-600"></i>
            </div>
            <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">89 online</span>
        </div>
        <h3 class="text-2xl font-bold text-gray-900">342</h3>
        <p class="text-sm text-gray-500">Active Devices</p>
    </div>

    <!-- Messages Today -->
    <div class="bg-white rounded-xl p-5 shadow-sm">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-paper-plane text-orange-600"></i>
            </div>
            <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">+8.3%</span>
        </div>
        <h3 class="text-2xl font-bold text-gray-900">52,847</h3>
        <p class="text-sm text-gray-500">Messages Today</p>
    </div>
</div>

<!-- Stats Row 2 -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-6">
    <!-- Active Subscriptions -->
    <div class="bg-white rounded-xl p-5 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-credit-card text-blue-600"></i>
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-900">892</h3>
                <p class="text-xs text-gray-500">Active Subs</p>
            </div>
        </div>
    </div>

    <!-- Churn Rate -->
    <div class="bg-white rounded-xl p-5 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-arrow-trend-down text-red-600"></i>
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-900">2.4%</h3>
                <p class="text-xs text-gray-500">Churn Rate</p>
            </div>
        </div>
    </div>

    <!-- API Requests -->
    <div class="bg-white rounded-xl p-5 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-code text-cyan-600"></i>
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-900">1.2M</h3>
                <p class="text-xs text-gray-500">API Requests</p>
            </div>
        </div>
    </div>

    <!-- Server Load -->
    <div class="bg-white rounded-xl p-5 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-server text-emerald-600"></i>
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-900">34%</h3>
                <p class="text-xs text-gray-500">Server Load</p>
            </div>
        </div>
    </div>
</div>

<div class="grid lg:grid-cols-3 gap-6">
    <!-- Revenue Chart -->
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm">
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-bold text-gray-900">Revenue Overview</h2>
            <select class="text-sm border border-gray-200 rounded-lg px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option>Last 7 days</option>
                <option>Last 30 days</option>
                <option>Last 3 months</option>
            </select>
        </div>
        <div class="p-5">
            <div class="h-64 bg-gray-50 rounded-lg flex items-center justify-center">
                <p class="text-gray-400">Revenue Chart Placeholder</p>
            </div>
        </div>
    </div>

    <!-- Recent Transactions -->
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-bold text-gray-900">Recent Transactions</h2>
            <a href="{{ route('admin.transactions') }}" class="text-sm text-indigo-600 hover:text-indigo-700">View All</a>
        </div>
        <div class="divide-y divide-gray-100">
            @php
                $transactions = [
                    ['user' => 'Toko Berkah', 'plan' => 'Pro', 'amount' => 199000, 'status' => 'success'],
                    ['user' => 'CV Maju Jaya', 'plan' => 'Enterprise', 'amount' => 499000, 'status' => 'success'],
                    ['user' => 'UD Sentosa', 'plan' => 'Pro', 'amount' => 199000, 'status' => 'pending'],
                    ['user' => 'PT Abadi', 'plan' => 'Enterprise', 'amount' => 499000, 'status' => 'success'],
                    ['user' => 'Warung Barokah', 'plan' => 'Pro', 'amount' => 199000, 'status' => 'failed'],
                ];
            @endphp
            @foreach($transactions as $tx)
                <div class="p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center">
                            <span class="text-xs font-medium text-gray-600">{{ substr($tx['user'], 0, 1) }}</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">{{ $tx['user'] }}</p>
                            <p class="text-xs text-gray-500">{{ $tx['plan'] }} Plan</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-900">Rp {{ number_format($tx['amount']) }}</p>
                        @php
                            $statusColors = [
                                'success' => 'text-green-600 bg-green-100',
                                'pending' => 'text-yellow-600 bg-yellow-100',
                                'failed' => 'text-red-600 bg-red-100',
                            ];
                        @endphp
                        <span class="text-xs px-2 py-0.5 rounded-full {{ $statusColors[$tx['status']] }}">{{ ucfirst($tx['status']) }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Second Row -->
<div class="grid lg:grid-cols-3 gap-6 mt-6">
    <!-- New Users -->
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-bold text-gray-900">New Users</h2>
            <a href="{{ route('admin.users') }}" class="text-sm text-indigo-600 hover:text-indigo-700">View All</a>
        </div>
        <div class="divide-y divide-gray-100">
            @php
                $newUsers = [
                    ['name' => 'Budi Santoso', 'email' => 'budi@email.com', 'time' => '5 min ago'],
                    ['name' => 'Siti Rahayu', 'email' => 'siti@email.com', 'time' => '15 min ago'],
                    ['name' => 'Ahmad Hidayat', 'email' => 'ahmad@email.com', 'time' => '1 hour ago'],
                    ['name' => 'Dewi Lestari', 'email' => 'dewi@email.com', 'time' => '2 hours ago'],
                ];
            @endphp
            @foreach($newUsers as $user)
                <div class="p-4 flex items-center gap-3">
                    <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                        <span class="text-indigo-600 font-medium">{{ substr($user['name'], 0, 1) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">{{ $user['name'] }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ $user['email'] }}</p>
                    </div>
                    <span class="text-xs text-gray-400">{{ $user['time'] }}</span>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Server Status -->
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-bold text-gray-900">Server Status</h2>
            <a href="{{ route('admin.servers') }}" class="text-sm text-indigo-600 hover:text-indigo-700">Manage</a>
        </div>
        <div class="p-5 space-y-4">
            @php
                $servers = [
                    ['name' => 'WA Server 1', 'location' => 'Jakarta', 'load' => 45, 'status' => 'healthy'],
                    ['name' => 'WA Server 2', 'location' => 'Singapore', 'load' => 32, 'status' => 'healthy'],
                    ['name' => 'API Server', 'location' => 'Jakarta', 'load' => 28, 'status' => 'healthy'],
                    ['name' => 'DB Primary', 'location' => 'Jakarta', 'load' => 56, 'status' => 'warning'],
                ];
            @endphp
            @foreach($servers as $server)
                <div class="flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full {{ $server['status'] === 'healthy' ? 'bg-green-500' : 'bg-yellow-500' }}"></div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-sm font-medium text-gray-900">{{ $server['name'] }}</span>
                            <span class="text-xs text-gray-500">{{ $server['load'] }}%</span>
                        </div>
                        <div class="h-1.5 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full rounded-full {{ $server['load'] > 50 ? 'bg-yellow-500' : 'bg-green-500' }}" style="width: {{ $server['load'] }}%"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-5 border-b border-gray-100">
            <h2 class="font-bold text-gray-900">Quick Actions</h2>
        </div>
        <div class="p-5 grid grid-cols-2 gap-3">
            <a href="{{ route('admin.users') }}" class="p-4 bg-gray-50 hover:bg-indigo-50 rounded-xl text-center transition-colors group">
                <div class="w-10 h-10 bg-indigo-100 group-hover:bg-indigo-200 rounded-lg flex items-center justify-center mx-auto mb-2 transition-colors">
                    <i class="fa-solid fa-user-plus text-indigo-600"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Add User</span>
            </a>
            <a href="{{ route('admin.plans') }}" class="p-4 bg-gray-50 hover:bg-purple-50 rounded-xl text-center transition-colors group">
                <div class="w-10 h-10 bg-purple-100 group-hover:bg-purple-200 rounded-lg flex items-center justify-center mx-auto mb-2 transition-colors">
                    <i class="fa-solid fa-tags text-purple-600"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Edit Plans</span>
            </a>
            <a href="{{ route('admin.broadcasts') }}" class="p-4 bg-gray-50 hover:bg-green-50 rounded-xl text-center transition-colors group">
                <div class="w-10 h-10 bg-green-100 group-hover:bg-green-200 rounded-lg flex items-center justify-center mx-auto mb-2 transition-colors">
                    <i class="fa-solid fa-bullhorn text-green-600"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Broadcast</span>
            </a>
            <a href="{{ route('admin.reports') }}" class="p-4 bg-gray-50 hover:bg-orange-50 rounded-xl text-center transition-colors group">
                <div class="w-10 h-10 bg-orange-100 group-hover:bg-orange-200 rounded-lg flex items-center justify-center mx-auto mb-2 transition-colors">
                    <i class="fa-solid fa-file-export text-orange-600"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Export</span>
            </a>
        </div>
    </div>
</div>
@endsection

