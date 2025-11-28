@extends('layouts.panel')

@section('title', 'Chat')
@section('page-title', 'Chat')
@section('page-description', 'Kelola percakapan WhatsApp Anda')

@section('content')
<div class="bg-white rounded-2xl shadow-sm overflow-hidden" style="height: calc(100vh - 280px); min-height: 500px;">
    <div class="flex h-full">
        <!-- Chat List -->
        <div class="w-full md:w-80 lg:w-96 border-r border-gray-100 flex flex-col">
            <!-- Search -->
            <div class="p-4 border-b border-gray-100">
                <div class="relative">
                    <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-wa-gray"></i>
                    <input type="text" placeholder="Cari chat..." class="w-full pl-10 pr-4 py-2 bg-wa-light-gray border-0 rounded-xl focus:outline-none focus:ring-2 focus:ring-wa-primary text-sm">
                </div>
            </div>

            <!-- Chat Items -->
            <div class="flex-1 overflow-y-auto">
                @php
                    $mockChats = [
                        ['name' => 'Budi Santoso', 'phone' => '+62 812-3456-7890', 'message' => 'Halo, apakah produk ini masih tersedia?', 'time' => '10:30', 'unread' => 3, 'active' => true],
                        ['name' => 'Siti Rahayu', 'phone' => '+62 813-9876-5432', 'message' => 'Terima kasih, pesanan sudah saya terima', 'time' => '10:15', 'unread' => 0, 'active' => false],
                        ['name' => 'Ahmad Hidayat', 'phone' => '+62 857-1234-5678', 'message' => 'Bisa kirim ke Surabaya?', 'time' => '09:45', 'unread' => 1, 'active' => false],
                        ['name' => 'Dewi Lestari', 'phone' => '+62 821-5678-9012', 'message' => 'Oke, saya transfer sekarang ya', 'time' => '09:20', 'unread' => 0, 'active' => false],
                        ['name' => 'Rudi Hermawan', 'phone' => '+62 878-4321-8765', 'message' => 'Ada diskon untuk pembelian grosir?', 'time' => '08:55', 'unread' => 2, 'active' => false],
                        ['name' => 'Maya Putri', 'phone' => '+62 859-8765-4321', 'message' => 'Kapan ready lagi kak?', 'time' => 'Kemarin', 'unread' => 0, 'active' => false],
                        ['name' => 'Eko Prasetyo', 'phone' => '+62 812-1111-2222', 'message' => 'Baik kak, ditunggu ya', 'time' => 'Kemarin', 'unread' => 0, 'active' => false],
                    ];
                @endphp

                @foreach($mockChats as $chat)
                    <div class="p-4 hover:bg-gray-50 cursor-pointer transition-colors border-b border-gray-50 {{ $chat['active'] ? 'bg-wa-primary/5 border-l-4 border-l-wa-primary' : '' }}">
                        <div class="flex items-center gap-3">
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
                                <span class="bg-wa-primary text-white text-xs font-medium w-5 h-5 rounded-full flex items-center justify-center">{{ $chat['unread'] }}</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Chat Area -->
        <div class="hidden md:flex flex-1 flex-col">
            <!-- Chat Header -->
            <div class="p-4 border-b border-gray-100 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-wa-primary/10 rounded-full flex items-center justify-center">
                        <span class="text-wa-primary font-semibold">B</span>
                    </div>
                    <div>
                        <h4 class="font-semibold text-wa-dark">Budi Santoso</h4>
                        <p class="text-xs text-wa-gray">+62 812-3456-7890 • Online</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button class="p-2 text-wa-gray hover:text-wa-dark hover:bg-gray-100 rounded-lg transition-all">
                        <i class="fa-solid fa-phone"></i>
                    </button>
                    <button class="p-2 text-wa-gray hover:text-wa-dark hover:bg-gray-100 rounded-lg transition-all">
                        <i class="fa-solid fa-video"></i>
                    </button>
                    <button class="p-2 text-wa-gray hover:text-wa-dark hover:bg-gray-100 rounded-lg transition-all">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                </div>
            </div>

            <!-- Messages -->
            <div class="flex-1 overflow-y-auto p-4 bg-[#E4DDD6] bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23d4cdc4%22%20fill-opacity%3D%220.15%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')]">
                <div class="space-y-3 max-w-3xl mx-auto">
                    <!-- Date Separator -->
                    <div class="text-center">
                        <span class="inline-block px-3 py-1 bg-white/80 text-wa-gray text-xs rounded-lg shadow-sm">Hari ini</span>
                    </div>

                    <!-- Incoming Message -->
                    <div class="flex justify-start">
                        <div class="bg-white rounded-2xl rounded-tl-sm px-4 py-2 max-w-[70%] shadow-sm">
                            <p class="text-wa-dark">Halo, apakah produk ini masih tersedia?</p>
                            <div class="text-xs text-wa-gray mt-1 text-right">10:28</div>
                        </div>
                    </div>

                    <!-- Outgoing Message -->
                    <div class="flex justify-end">
                        <div class="bg-[#D9FDD3] rounded-2xl rounded-tr-sm px-4 py-2 max-w-[70%] shadow-sm">
                            <p class="text-wa-dark">Halo kak! Iya ready stock, mau order berapa?</p>
                            <div class="text-xs text-wa-gray mt-1 text-right flex items-center justify-end gap-1">
                                10:29
                                <i class="fa-solid fa-check-double text-blue-500"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Incoming Message -->
                    <div class="flex justify-start">
                        <div class="bg-white rounded-2xl rounded-tl-sm px-4 py-2 max-w-[70%] shadow-sm">
                            <p class="text-wa-dark">Saya mau pesan 3 pcs kak. Bisa COD gak?</p>
                            <div class="text-xs text-wa-gray mt-1 text-right">10:30</div>
                        </div>
                    </div>

                    <!-- Outgoing Message -->
                    <div class="flex justify-end">
                        <div class="bg-[#D9FDD3] rounded-2xl rounded-tr-sm px-4 py-2 max-w-[70%] shadow-sm">
                            <p class="text-wa-dark">Bisa kak, untuk alamat lengkapnya dimana ya?</p>
                            <div class="text-xs text-wa-gray mt-1 text-right flex items-center justify-end gap-1">
                                10:30
                                <i class="fa-solid fa-check-double text-blue-500"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Incoming Message -->
                    <div class="flex justify-start">
                        <div class="bg-white rounded-2xl rounded-tl-sm px-4 py-2 max-w-[70%] shadow-sm">
                            <p class="text-wa-dark">Jl. Sudirman No. 123, Jakarta Selatan. Kode pos 12345</p>
                            <div class="text-xs text-wa-gray mt-1 text-right">10:31</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Input Area -->
            <div class="p-4 bg-wa-light-gray border-t border-gray-100">
                <div class="flex items-center gap-3">
                    <button class="p-2 text-wa-gray hover:text-wa-dark transition-colors">
                        <i class="fa-regular fa-face-smile text-xl"></i>
                    </button>
                    <button class="p-2 text-wa-gray hover:text-wa-dark transition-colors">
                        <i class="fa-solid fa-paperclip text-xl"></i>
                    </button>
                    <div class="flex-1">
                        <input type="text" placeholder="Ketik pesan..." class="w-full px-4 py-2.5 bg-white rounded-xl border-0 focus:outline-none focus:ring-2 focus:ring-wa-primary">
                    </div>
                    <button class="w-10 h-10 bg-wa-primary hover:bg-wa-primary-dark text-white rounded-full flex items-center justify-center transition-all">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Empty State for Mobile -->
        <div class="md:hidden flex-1 flex items-center justify-center bg-wa-light-gray">
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-wa-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fa-solid fa-comments text-wa-primary text-2xl"></i>
                </div>
                <p class="text-wa-gray">Pilih chat untuk memulai percakapan</p>
            </div>
        </div>
    </div>
</div>
@endsection

