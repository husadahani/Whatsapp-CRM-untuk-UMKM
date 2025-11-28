@extends('layouts.admin')

@section('title', 'Messages Log')
@section('page-title', 'Messages Log')
@section('page-description', 'View all WhatsApp message logs')

@section('content')
<!-- Stats -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-paper-plane text-indigo-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">52.8K</p>
                <p class="text-xs text-gray-500">Today</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-check-double text-green-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">98.5%</p>
                <p class="text-xs text-gray-500">Delivered</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-eye text-blue-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">87.2%</p>
                <p class="text-xs text-gray-500">Read Rate</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-triangle-exclamation text-red-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">156</p>
                <p class="text-xs text-gray-500">Failed</p>
            </div>
        </div>
    </div>
</div>

<!-- Messages Table -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row justify-between gap-4">
        <div class="flex gap-2">
            <select class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white">
                <option>All Types</option>
                <option>Text</option>
                <option>Image</option>
                <option>Document</option>
                <option>Broadcast</option>
            </select>
            <select class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white">
                <option>All Status</option>
                <option>Sent</option>
                <option>Delivered</option>
                <option>Read</option>
                <option>Failed</option>
            </select>
        </div>
        <div class="relative">
            <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" placeholder="Search messages..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">From</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">To</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Message</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Type</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Time</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @php
                    $messages = [
                        ['from' => 'Toko Berkah', 'to' => '+62 812-xxxx-1234', 'message' => 'Terima kasih sudah order! Pesanan Anda sedang diproses.', 'type' => 'text', 'status' => 'read', 'time' => '10:30'],
                        ['from' => 'CV Maju', 'to' => '+62 813-xxxx-5678', 'message' => '[Image] product_catalog.jpg', 'type' => 'image', 'status' => 'delivered', 'time' => '10:28'],
                        ['from' => 'UD Sentosa', 'to' => '156 recipients', 'message' => 'PROMO AKHIR TAHUN! Diskon 25% untuk semua produk...', 'type' => 'broadcast', 'status' => 'sent', 'time' => '10:25'],
                        ['from' => 'PT Abadi', 'to' => '+62 821-xxxx-9012', 'message' => '[Document] invoice_001.pdf', 'type' => 'document', 'status' => 'read', 'time' => '10:20'],
                        ['from' => 'Warung Barokah', 'to' => '+62 878-xxxx-3456', 'message' => 'Baik kak, pesanan segera dikirim hari ini.', 'type' => 'text', 'status' => 'failed', 'time' => '10:15'],
                        ['from' => 'Apotek Sehat', 'to' => '+62 859-xxxx-7890', 'message' => 'Stok obat yang Anda cari sudah tersedia.', 'type' => 'text', 'status' => 'delivered', 'time' => '10:10'],
                    ];
                @endphp

                @foreach($messages as $msg)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $msg['from'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 font-mono">{{ $msg['to'] }}</td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-700 truncate max-w-xs">{{ $msg['message'] }}</p>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $typeColors = [
                                    'text' => 'bg-gray-100 text-gray-700',
                                    'image' => 'bg-blue-100 text-blue-700',
                                    'document' => 'bg-orange-100 text-orange-700',
                                    'broadcast' => 'bg-purple-100 text-purple-700',
                                ];
                            @endphp
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $typeColors[$msg['type']] }}">
                                {{ ucfirst($msg['type']) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusColors = [
                                    'sent' => 'text-gray-500',
                                    'delivered' => 'text-green-600',
                                    'read' => 'text-blue-600',
                                    'failed' => 'text-red-600',
                                ];
                                $statusIcons = [
                                    'sent' => 'fa-check',
                                    'delivered' => 'fa-check-double',
                                    'read' => 'fa-check-double',
                                    'failed' => 'fa-xmark',
                                ];
                            @endphp
                            <span class="{{ $statusColors[$msg['status']] }} flex items-center gap-1">
                                <i class="fa-solid {{ $statusIcons[$msg['status']] }}"></i>
                                <span class="text-sm">{{ ucfirst($msg['status']) }}</span>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $msg['time'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
        <p class="text-sm text-gray-500">Showing 1-6 of 52,847 messages</p>
        <div class="flex gap-1">
            <button class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-100 rounded-lg">Previous</button>
            <button class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-100 rounded-lg">Next</button>
        </div>
    </div>
</div>
@endsection

