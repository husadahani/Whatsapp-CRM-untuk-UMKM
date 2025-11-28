@extends('layouts.panel')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Ringkasan aktivitas WhatsApp CRM Anda')

@section('page-actions')
<div class="flex gap-2">
    <button class="px-4 py-2 bg-wa-primary hover:bg-wa-primary-dark text-white font-medium rounded-xl transition-all flex items-center gap-2">
        <i class="fa-solid fa-plus"></i>
        <span>Tambah Device</span>
    </button>
</div>
@endsection

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
    <!-- Total Devices -->
    <div class="bg-white rounded-2xl p-4 lg:p-6 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-wa-primary/10 rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-mobile-screen text-wa-primary text-xl"></i>
            </div>
            <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">+2</span>
        </div>
        <h3 class="text-2xl lg:text-3xl font-bold text-wa-dark">3</h3>
        <p class="text-wa-gray text-sm">Device Aktif</p>
    </div>

    <!-- Total Contacts -->
    <div class="bg-white rounded-2xl p-4 lg:p-6 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-address-book text-blue-600 text-xl"></i>
            </div>
            <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">+156</span>
        </div>
        <h3 class="text-2xl lg:text-3xl font-bold text-wa-dark">2,458</h3>
        <p class="text-wa-gray text-sm">Total Kontak</p>
    </div>

    <!-- Messages Sent -->
    <div class="bg-white rounded-2xl p-4 lg:p-6 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-paper-plane text-purple-600 text-xl"></i>
            </div>
            <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">+1.2K</span>
        </div>
        <h3 class="text-2xl lg:text-3xl font-bold text-wa-dark">15,847</h3>
        <p class="text-wa-gray text-sm">Pesan Terkirim</p>
    </div>

    <!-- Response Rate -->
    <div class="bg-white rounded-2xl p-4 lg:p-6 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-chart-line text-orange-600 text-xl"></i>
            </div>
            <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">+5%</span>
        </div>
        <h3 class="text-2xl lg:text-3xl font-bold text-wa-dark">94%</h3>
        <p class="text-wa-gray text-sm">Response Rate</p>
    </div>
</div>

<div class="grid lg:grid-cols-3 gap-6">
    <!-- Recent Chats -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm">
        <div class="p-4 lg:p-6 border-b border-gray-100 flex items-center justify-between">
            <h2 class="text-lg font-bold text-wa-dark">Chat Terbaru</h2>
            <a href="{{ route('panel.chats') }}" class="text-sm text-wa-primary hover:text-wa-primary-dark transition-colors">
                Lihat Semua
            </a>
        </div>
        <div class="divide-y divide-gray-100">
            @php
                $mockChats = [
                    ['name' => 'Budi Santoso', 'phone' => '+62 812-3456-7890', 'message' => 'Halo, apakah produk ini masih tersedia?', 'time' => '2 menit lalu', 'unread' => 3],
                    ['name' => 'Siti Rahayu', 'phone' => '+62 813-9876-5432', 'message' => 'Terima kasih, pesanan sudah saya terima', 'time' => '15 menit lalu', 'unread' => 0],
                    ['name' => 'Ahmad Hidayat', 'phone' => '+62 857-1234-5678', 'message' => 'Bisa kirim ke Surabaya?', 'time' => '1 jam lalu', 'unread' => 1],
                    ['name' => 'Dewi Lestari', 'phone' => '+62 821-5678-9012', 'message' => 'Oke, saya transfer sekarang ya', 'time' => '2 jam lalu', 'unread' => 0],
                    ['name' => 'Rudi Hermawan', 'phone' => '+62 878-4321-8765', 'message' => 'Ada diskon untuk pembelian grosir?', 'time' => '3 jam lalu', 'unread' => 2],
                ];
            @endphp

            @foreach($mockChats as $chat)
                <div class="p-4 lg:px-6 hover:bg-gray-50 transition-colors cursor-pointer flex items-center gap-4">
                    <div class="w-12 h-12 bg-wa-primary/10 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-wa-primary font-semibold">{{ substr($chat['name'], 0, 1) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between gap-2 mb-1">
                            <h4 class="font-semibold text-wa-dark truncate">{{ $chat['name'] }}</h4>
                            <span class="text-xs text-wa-gray whitespace-nowrap">{{ $chat['time'] }}</span>
                        </div>
                        <p class="text-sm text-wa-gray truncate">{{ $chat['message'] }}</p>
                    </div>
                    @if($chat['unread'] > 0)
                        <span class="bg-wa-primary text-white text-xs font-medium px-2 py-1 rounded-full">{{ $chat['unread'] }}</span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <!-- Quick Actions & Device Status -->
    <div class="space-y-6">
        <!-- Quick Actions -->
        <div class="bg-white rounded-2xl shadow-sm p-4 lg:p-6">
            <h2 class="text-lg font-bold text-wa-dark mb-4">Aksi Cepat</h2>
            <div class="grid grid-cols-2 gap-3">
                <button class="p-4 bg-wa-light-gray hover:bg-wa-primary/10 rounded-xl transition-all text-center group">
                    <div class="w-10 h-10 bg-wa-primary/10 group-hover:bg-wa-primary rounded-lg flex items-center justify-center mx-auto mb-2 transition-all">
                        <i class="fa-solid fa-paper-plane text-wa-primary group-hover:text-white transition-all"></i>
                    </div>
                    <span class="text-sm font-medium text-wa-dark">Broadcast</span>
                </button>
                <button class="p-4 bg-wa-light-gray hover:bg-wa-primary/10 rounded-xl transition-all text-center group">
                    <div class="w-10 h-10 bg-wa-primary/10 group-hover:bg-wa-primary rounded-lg flex items-center justify-center mx-auto mb-2 transition-all">
                        <i class="fa-solid fa-user-plus text-wa-primary group-hover:text-white transition-all"></i>
                    </div>
                    <span class="text-sm font-medium text-wa-dark">Tambah Kontak</span>
                </button>
                <button class="p-4 bg-wa-light-gray hover:bg-wa-primary/10 rounded-xl transition-all text-center group">
                    <div class="w-10 h-10 bg-wa-primary/10 group-hover:bg-wa-primary rounded-lg flex items-center justify-center mx-auto mb-2 transition-all">
                        <i class="fa-solid fa-robot text-wa-primary group-hover:text-white transition-all"></i>
                    </div>
                    <span class="text-sm font-medium text-wa-dark">Auto Reply</span>
                </button>
                <button class="p-4 bg-wa-light-gray hover:bg-wa-primary/10 rounded-xl transition-all text-center group">
                    <div class="w-10 h-10 bg-wa-primary/10 group-hover:bg-wa-primary rounded-lg flex items-center justify-center mx-auto mb-2 transition-all">
                        <i class="fa-solid fa-file-import text-wa-primary group-hover:text-white transition-all"></i>
                    </div>
                    <span class="text-sm font-medium text-wa-dark">Import</span>
                </button>
            </div>
        </div>

        <!-- Device Status -->
        <div class="bg-white rounded-2xl shadow-sm p-4 lg:p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold text-wa-dark">Status Device</h2>
                <a href="{{ route('panel.devices') }}" class="text-sm text-wa-primary hover:text-wa-primary-dark transition-colors">
                    Kelola
                </a>
            </div>
            <div class="space-y-3">
                @php
                    $mockDevices = [
                        ['name' => 'Toko Utama', 'phone' => '+62 812-3456-7890', 'status' => 'connected'],
                        ['name' => 'CS Support', 'phone' => '+62 813-9876-5432', 'status' => 'connected'],
                        ['name' => 'Marketing', 'phone' => '+62 857-1234-5678', 'status' => 'disconnected'],
                    ];
                @endphp

                @foreach($mockDevices as $device)
                    <div class="flex items-center gap-3 p-3 bg-wa-light-gray rounded-xl">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                            <i class="fa-solid fa-mobile-screen text-wa-secondary"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="font-medium text-wa-dark text-sm truncate">{{ $device['name'] }}</h4>
                            <p class="text-xs text-wa-gray truncate">{{ $device['phone'] }}</p>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full {{ $device['status'] === 'connected' ? 'bg-green-500' : 'bg-red-500' }}"></span>
                            <span class="text-xs {{ $device['status'] === 'connected' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $device['status'] === 'connected' ? 'Online' : 'Offline' }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Subscription Info -->
        <div class="bg-gradient-to-br from-wa-secondary to-wa-teal rounded-2xl shadow-sm p-4 lg:p-6 text-white">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                    <i class="fa-solid fa-crown"></i>
                </div>
                <div>
                    <h3 class="font-bold">Paket Pro</h3>
                    <p class="text-sm text-white/80">Aktif hingga 28 Des 2025</p>
                </div>
            </div>
            <div class="space-y-2 mb-4">
                <div class="flex justify-between text-sm">
                    <span class="text-white/80">Pesan terkirim</span>
                    <span class="font-medium">15,847 / Unlimited</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-white/80">Device</span>
                    <span class="font-medium">3 / 3</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-white/80">Kontak</span>
                    <span class="font-medium">2,458 / 10,000</span>
                </div>
            </div>
            <button class="w-full py-2.5 bg-white text-wa-secondary font-medium rounded-xl hover:bg-wa-light transition-all">
                Upgrade ke Enterprise
            </button>
        </div>
    </div>
</div>
@endsection

