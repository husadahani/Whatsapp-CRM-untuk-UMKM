@extends('layouts.admin')

@section('title', 'Broadcasts')
@section('page-title', 'Broadcasts')
@section('page-description', 'Monitor all broadcast campaigns')

@section('content')
<!-- Stats -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-bullhorn text-indigo-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">1,234</p>
                <p class="text-xs text-gray-500">Total Broadcasts</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-check text-green-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">1,156</p>
                <p class="text-xs text-gray-500">Completed</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-spinner text-orange-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">45</p>
                <p class="text-xs text-gray-500">Running</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-clock text-blue-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">33</p>
                <p class="text-xs text-gray-500">Scheduled</p>
            </div>
        </div>
    </div>
</div>

<!-- Broadcasts Table -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row justify-between gap-4">
        <div class="flex gap-2">
            <select class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white">
                <option>All Status</option>
                <option>Completed</option>
                <option>Running</option>
                <option>Scheduled</option>
                <option>Failed</option>
            </select>
        </div>
        <div class="relative">
            <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" placeholder="Search broadcasts..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Campaign</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">User</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Recipients</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Progress</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @php
                    $broadcasts = [
                        ['name' => 'Promo Akhir Tahun', 'user' => 'Toko Berkah', 'recipients' => 1250, 'sent' => 1250, 'status' => 'completed', 'date' => '28 Nov 2025'],
                        ['name' => 'Flash Sale Weekend', 'user' => 'CV Maju', 'recipients' => 2100, 'sent' => 1456, 'status' => 'running', 'date' => '28 Nov 2025'],
                        ['name' => 'Info Produk Baru', 'user' => 'UD Sentosa', 'recipients' => 856, 'sent' => 0, 'status' => 'scheduled', 'date' => '30 Nov 2025'],
                        ['name' => 'Ucapan Terima Kasih', 'user' => 'PT Abadi', 'recipients' => 500, 'sent' => 500, 'status' => 'completed', 'date' => '25 Nov 2025'],
                        ['name' => 'Reminder Payment', 'user' => 'Warung Barokah', 'recipients' => 45, 'sent' => 45, 'status' => 'completed', 'date' => '24 Nov 2025'],
                    ];
                @endphp

                @foreach($broadcasts as $bc)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $bc['name'] }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $bc['user'] }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ number_format($bc['recipients']) }}</td>
                        <td class="px-6 py-4">
                            @if($bc['status'] === 'running')
                                <div class="w-24">
                                    <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-full bg-indigo-600 rounded-full" style="width: {{ ($bc['sent'] / $bc['recipients']) * 100 }}%"></div>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">{{ round(($bc['sent'] / $bc['recipients']) * 100) }}%</p>
                                </div>
                            @elseif($bc['status'] === 'completed')
                                <span class="text-sm text-green-600">{{ number_format($bc['sent']) }} sent</span>
                            @else
                                <span class="text-sm text-gray-500">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusColors = [
                                    'completed' => 'bg-green-100 text-green-700',
                                    'running' => 'bg-orange-100 text-orange-700',
                                    'scheduled' => 'bg-blue-100 text-blue-700',
                                    'failed' => 'bg-red-100 text-red-700',
                                ];
                            @endphp
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $statusColors[$bc['status']] }}">
                                {{ ucfirst($bc['status']) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $bc['date'] }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">
                                <button class="p-2 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all" title="View">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                @if($bc['status'] === 'running')
                                    <button class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all" title="Stop">
                                        <i class="fa-solid fa-stop"></i>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
        <p class="text-sm text-gray-500">Showing 1-5 of 1,234 broadcasts</p>
        <div class="flex gap-1">
            <button class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-100 rounded-lg">Previous</button>
            <button class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-100 rounded-lg">Next</button>
        </div>
    </div>
</div>
@endsection

