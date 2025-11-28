@extends('layouts.panel')

@section('title', 'Devices')
@section('page-title', 'Devices')
@section('page-description', 'Kelola device WhatsApp yang terhubung')

@section('page-actions')
<button class="px-4 py-2 bg-wa-primary hover:bg-wa-primary-dark text-white font-medium rounded-xl transition-all flex items-center gap-2">
    <i class="fa-solid fa-plus"></i>
    <span>Tambah Device</span>
</button>
@endsection

@section('content')
<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    @php
        $mockDevices = [
            ['id' => 1, 'name' => 'Toko Utama', 'phone' => '+62 812-3456-7890', 'status' => 'connected', 'messages_sent' => 5234, 'last_active' => '2 menit lalu'],
            ['id' => 2, 'name' => 'CS Support', 'phone' => '+62 813-9876-5432', 'status' => 'connected', 'messages_sent' => 8921, 'last_active' => '5 menit lalu'],
            ['id' => 3, 'name' => 'Marketing', 'phone' => '+62 857-1234-5678', 'status' => 'disconnected', 'messages_sent' => 1692, 'last_active' => '2 jam lalu'],
        ];
    @endphp

    @foreach($mockDevices as $device)
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-wa-primary/10 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-mobile-screen text-wa-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-wa-dark">{{ $device['name'] }}</h3>
                            <p class="text-sm text-wa-gray">{{ $device['phone'] }}</p>
                        </div>
                    </div>
                    <div class="relative">
                        <button class="p-2 text-wa-gray hover:text-wa-dark hover:bg-gray-100 rounded-lg transition-all">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-center gap-2 mb-4">
                    <span class="w-2.5 h-2.5 rounded-full {{ $device['status'] === 'connected' ? 'bg-green-500' : 'bg-red-500' }}"></span>
                    <span class="text-sm font-medium {{ $device['status'] === 'connected' ? 'text-green-600' : 'text-red-600' }}">
                        {{ $device['status'] === 'connected' ? 'Terhubung' : 'Terputus' }}
                    </span>
                    <span class="text-sm text-wa-gray">• {{ $device['last_active'] }}</span>
                </div>

                <div class="grid grid-cols-2 gap-4 p-4 bg-wa-light-gray rounded-xl">
                    <div>
                        <p class="text-xs text-wa-gray mb-1">Pesan Terkirim</p>
                        <p class="font-bold text-wa-dark">{{ number_format($device['messages_sent']) }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-wa-gray mb-1">Status</p>
                        <p class="font-bold text-wa-dark">Aktif</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-100 p-4 flex gap-2">
                @if($device['status'] === 'connected')
                    <button class="flex-1 py-2 text-sm font-medium text-wa-gray hover:text-red-600 hover:bg-red-50 rounded-lg transition-all">
                        <i class="fa-solid fa-power-off mr-1"></i> Disconnect
                    </button>
                @else
                    <button class="flex-1 py-2 text-sm font-medium text-white bg-wa-primary hover:bg-wa-primary-dark rounded-lg transition-all">
                        <i class="fa-solid fa-qrcode mr-1"></i> Scan QR
                    </button>
                @endif
                <button class="flex-1 py-2 text-sm font-medium text-wa-gray hover:text-wa-dark hover:bg-gray-100 rounded-lg transition-all">
                    <i class="fa-solid fa-gear mr-1"></i> Settings
                </button>
            </div>
        </div>
    @endforeach

    <!-- Add New Device Card -->
    <div class="bg-white rounded-2xl shadow-sm border-2 border-dashed border-gray-200 hover:border-wa-primary transition-colors cursor-pointer flex items-center justify-center min-h-[280px]">
        <div class="text-center p-6">
            <div class="w-16 h-16 bg-wa-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fa-solid fa-plus text-wa-primary text-2xl"></i>
            </div>
            <h3 class="font-bold text-wa-dark mb-2">Tambah Device Baru</h3>
            <p class="text-sm text-wa-gray">Hubungkan nomor WhatsApp baru</p>
        </div>
    </div>
</div>
@endsection

