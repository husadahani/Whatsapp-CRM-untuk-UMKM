@extends('layouts.admin')

@section('title', 'Servers')
@section('page-title', 'Server Management')
@section('page-description', 'Monitor and manage server infrastructure')

@section('content')
<!-- Overall Stats -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-server text-green-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">8</p>
                <p class="text-xs text-gray-500">Total Servers</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-microchip text-indigo-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">34%</p>
                <p class="text-xs text-gray-500">Avg CPU</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-memory text-purple-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">62%</p>
                <p class="text-xs text-gray-500">Avg Memory</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-clock text-cyan-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">99.9%</p>
                <p class="text-xs text-gray-500">Uptime</p>
            </div>
        </div>
    </div>
</div>

<!-- Server Cards -->
<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    @php
        $servers = [
            ['name' => 'WA Server 1', 'location' => 'Jakarta', 'ip' => '103.xxx.xxx.1', 'cpu' => 45, 'memory' => 68, 'disk' => 42, 'status' => 'healthy', 'devices' => 45],
            ['name' => 'WA Server 2', 'location' => 'Singapore', 'ip' => '103.xxx.xxx.2', 'cpu' => 32, 'memory' => 54, 'disk' => 38, 'status' => 'healthy', 'devices' => 38],
            ['name' => 'WA Server 3', 'location' => 'Jakarta', 'ip' => '103.xxx.xxx.3', 'cpu' => 28, 'memory' => 45, 'disk' => 35, 'status' => 'healthy', 'devices' => 32],
            ['name' => 'API Server', 'location' => 'Jakarta', 'ip' => '103.xxx.xxx.10', 'cpu' => 38, 'memory' => 72, 'disk' => 45, 'status' => 'healthy', 'devices' => null],
            ['name' => 'DB Primary', 'location' => 'Jakarta', 'ip' => '103.xxx.xxx.20', 'cpu' => 56, 'memory' => 78, 'disk' => 65, 'status' => 'warning', 'devices' => null],
            ['name' => 'DB Replica', 'location' => 'Singapore', 'ip' => '103.xxx.xxx.21', 'cpu' => 24, 'memory' => 45, 'disk' => 65, 'status' => 'healthy', 'devices' => null],
            ['name' => 'Redis Cache', 'location' => 'Jakarta', 'ip' => '103.xxx.xxx.30', 'cpu' => 12, 'memory' => 85, 'disk' => 20, 'status' => 'healthy', 'devices' => null],
            ['name' => 'Load Balancer', 'location' => 'Jakarta', 'ip' => '103.xxx.xxx.100', 'cpu' => 8, 'memory' => 25, 'disk' => 15, 'status' => 'healthy', 'devices' => null],
        ];
    @endphp

    @foreach($servers as $server)
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="p-4 border-b border-gray-100">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="font-bold text-gray-900">{{ $server['name'] }}</h3>
                    <span class="w-2.5 h-2.5 rounded-full {{ $server['status'] === 'healthy' ? 'bg-green-500' : 'bg-yellow-500' }}"></span>
                </div>
                <div class="flex items-center gap-2 text-xs text-gray-500">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>{{ $server['location'] }}</span>
                    <span>•</span>
                    <span class="font-mono">{{ $server['ip'] }}</span>
                </div>
            </div>
            <div class="p-4 space-y-3">
                <!-- CPU -->
                <div>
                    <div class="flex items-center justify-between text-xs mb-1">
                        <span class="text-gray-500">CPU</span>
                        <span class="font-medium {{ $server['cpu'] > 80 ? 'text-red-600' : 'text-gray-700' }}">{{ $server['cpu'] }}%</span>
                    </div>
                    <div class="h-1.5 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full rounded-full {{ $server['cpu'] > 80 ? 'bg-red-500' : ($server['cpu'] > 50 ? 'bg-yellow-500' : 'bg-green-500') }}" style="width: {{ $server['cpu'] }}%"></div>
                    </div>
                </div>
                <!-- Memory -->
                <div>
                    <div class="flex items-center justify-between text-xs mb-1">
                        <span class="text-gray-500">Memory</span>
                        <span class="font-medium {{ $server['memory'] > 80 ? 'text-red-600' : 'text-gray-700' }}">{{ $server['memory'] }}%</span>
                    </div>
                    <div class="h-1.5 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full rounded-full {{ $server['memory'] > 80 ? 'bg-red-500' : ($server['memory'] > 50 ? 'bg-yellow-500' : 'bg-green-500') }}" style="width: {{ $server['memory'] }}%"></div>
                    </div>
                </div>
                <!-- Disk -->
                <div>
                    <div class="flex items-center justify-between text-xs mb-1">
                        <span class="text-gray-500">Disk</span>
                        <span class="font-medium {{ $server['disk'] > 80 ? 'text-red-600' : 'text-gray-700' }}">{{ $server['disk'] }}%</span>
                    </div>
                    <div class="h-1.5 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full rounded-full {{ $server['disk'] > 80 ? 'bg-red-500' : ($server['disk'] > 50 ? 'bg-yellow-500' : 'bg-green-500') }}" style="width: {{ $server['disk'] }}%"></div>
                    </div>
                </div>
                @if($server['devices'])
                    <div class="pt-2 border-t border-gray-100">
                        <div class="flex items-center gap-2 text-xs text-gray-500">
                            <i class="fa-solid fa-mobile-screen"></i>
                            <span>{{ $server['devices'] }} devices connected</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>

<!-- Server Logs -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="p-4 border-b border-gray-100 flex items-center justify-between">
        <h2 class="font-bold text-gray-900">Recent Server Logs</h2>
        <button class="text-sm text-indigo-600 hover:text-indigo-700">View All</button>
    </div>
    <div class="p-4 bg-gray-900 font-mono text-sm text-gray-300 max-h-64 overflow-y-auto">
        <p class="text-green-400">[2025-11-28 10:30:15] INFO: WA Server 1 - 45 devices connected</p>
        <p class="text-green-400">[2025-11-28 10:30:10] INFO: API Server - Request rate: 1,234/min</p>
        <p class="text-yellow-400">[2025-11-28 10:29:55] WARN: DB Primary - High memory usage: 78%</p>
        <p class="text-green-400">[2025-11-28 10:29:45] INFO: Redis Cache - Hit rate: 98.5%</p>
        <p class="text-green-400">[2025-11-28 10:29:30] INFO: Load Balancer - Active connections: 892</p>
        <p class="text-green-400">[2025-11-28 10:29:15] INFO: WA Server 2 - 38 devices connected</p>
        <p class="text-green-400">[2025-11-28 10:29:00] INFO: System health check: All systems operational</p>
    </div>
</div>
@endsection

