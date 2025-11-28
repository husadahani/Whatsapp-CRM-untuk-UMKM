@extends('layouts.admin')

@section('title', 'All Devices')
@section('page-title', 'All Devices')
@section('page-description', 'Monitor all connected WhatsApp devices')

@section('content')
<!-- Stats -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-mobile-screen text-indigo-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">342</p>
                <p class="text-xs text-gray-500">Total Devices</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-signal text-green-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">89</p>
                <p class="text-xs text-gray-500">Online Now</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-clock text-yellow-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">156</p>
                <p class="text-xs text-gray-500">Idle</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-plug text-red-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">97</p>
                <p class="text-xs text-gray-500">Disconnected</p>
            </div>
        </div>
    </div>
</div>

<!-- Devices Table -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row justify-between gap-4">
        <div class="flex gap-2">
            <select class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white">
                <option>All Status</option>
                <option>Online</option>
                <option>Idle</option>
                <option>Disconnected</option>
            </select>
        </div>
        <div class="relative">
            <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" placeholder="Search devices..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Device</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Owner</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Phone Number</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Messages</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Last Active</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @php
                    $devices = [
                        ['name' => 'Toko Utama', 'owner' => 'Toko Berkah', 'phone' => '+62 812-3456-7890', 'messages' => 5234, 'status' => 'online', 'last_active' => 'Now'],
                        ['name' => 'CS Support', 'owner' => 'CV Maju', 'phone' => '+62 813-9876-5432', 'messages' => 8921, 'status' => 'online', 'last_active' => 'Now'],
                        ['name' => 'Marketing', 'owner' => 'UD Sentosa', 'phone' => '+62 857-1234-5678', 'messages' => 1692, 'status' => 'idle', 'last_active' => '15 min ago'],
                        ['name' => 'Sales', 'owner' => 'PT Abadi', 'phone' => '+62 821-5678-9012', 'messages' => 3456, 'status' => 'online', 'last_active' => 'Now'],
                        ['name' => 'Admin', 'owner' => 'Warung Barokah', 'phone' => '+62 878-4321-8765', 'messages' => 892, 'status' => 'disconnected', 'last_active' => '2 hours ago'],
                        ['name' => 'Broadcast', 'owner' => 'Apotek Sehat', 'phone' => '+62 859-8765-4321', 'messages' => 12456, 'status' => 'idle', 'last_active' => '30 min ago'],
                    ];
                @endphp

                @foreach($devices as $device)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <i class="fa-solid fa-mobile-screen text-gray-600"></i>
                                </div>
                                <span class="font-medium text-gray-900">{{ $device['name'] }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-700">{{ $device['owner'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 font-mono">{{ $device['phone'] }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ number_format($device['messages']) }}</td>
                        <td class="px-6 py-4">
                            @php
                                $statusColors = [
                                    'online' => 'bg-green-100 text-green-700',
                                    'idle' => 'bg-yellow-100 text-yellow-700',
                                    'disconnected' => 'bg-red-100 text-red-700',
                                ];
                                $statusDots = [
                                    'online' => 'bg-green-500',
                                    'idle' => 'bg-yellow-500',
                                    'disconnected' => 'bg-red-500',
                                ];
                            @endphp
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full {{ $statusDots[$device['status']] }}"></span>
                                <span class="text-sm {{ $device['status'] === 'online' ? 'text-green-700' : ($device['status'] === 'idle' ? 'text-yellow-700' : 'text-red-700') }}">
                                    {{ ucfirst($device['status']) }}
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $device['last_active'] }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">
                                <button class="p-2 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all" title="View">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all" title="Disconnect">
                                    <i class="fa-solid fa-plug"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
        <p class="text-sm text-gray-500">Showing 1-6 of 342 devices</p>
        <div class="flex gap-1">
            <button class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-100 rounded-lg">Previous</button>
            <button class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-100 rounded-lg">Next</button>
        </div>
    </div>
</div>
@endsection

