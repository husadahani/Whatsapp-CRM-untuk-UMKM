<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IndoWhatCRM - WhatsApp CRM untuk UMKM Indonesia</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-wa-dark">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-wa-primary rounded-xl flex items-center justify-center">
                        <i class="fa-brands fa-whatsapp text-white text-xl"></i>
                    </div>
                    <span class="text-xl font-bold text-wa-secondary">IndoWhatCRM</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="#fitur" class="text-wa-gray hover:text-wa-secondary transition-colors">Fitur</a>
                    <a href="#keuntungan" class="text-wa-gray hover:text-wa-secondary transition-colors">Keuntungan</a>
                    <a href="#harga" class="text-wa-gray hover:text-wa-secondary transition-colors">Harga</a>
                </div>

                <!-- Auth Buttons -->
                <div class="flex items-center gap-3">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-wa-secondary font-medium hover:text-wa-primary transition-colors">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 text-wa-secondary font-medium hover:text-wa-primary transition-colors">
                                Masuk
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-5 py-2.5 bg-wa-primary hover:bg-wa-primary-dark text-white font-medium rounded-xl transition-all hover:shadow-lg hover:shadow-wa-primary/25">
                                    Daftar Gratis
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 bg-gradient-to-br from-wa-light-gray via-white to-wa-light/30 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Hero Content -->
                <div class="text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-wa-primary/10 rounded-full text-wa-secondary text-sm font-medium mb-6">
                        <i class="fa-solid fa-rocket"></i>
                        <span>Platform WhatsApp CRM #1 untuk UMKM</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-wa-dark leading-tight mb-6">
                        Kelola WhatsApp Bisnis Anda dengan
                        <span class="text-wa-primary">Mudah</span>
                    </h1>
                    <p class="text-lg text-wa-gray mb-8 max-w-xl mx-auto lg:mx-0">
                        Tingkatkan penjualan dan layanan pelanggan UMKM Anda dengan fitur broadcast, auto-reply, dan manajemen kontak dalam satu platform.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ Route::has('register') ? route('register') : '#' }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-wa-primary hover:bg-wa-primary-dark text-white font-semibold rounded-2xl transition-all hover:shadow-xl hover:shadow-wa-primary/30 hover:-translate-y-0.5">
                            <span>Mulai Gratis</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        <a href="#demo" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white border-2 border-wa-secondary/20 text-wa-secondary font-semibold rounded-2xl transition-all hover:border-wa-secondary hover:shadow-lg">
                            <i class="fa-solid fa-play"></i>
                            <span>Lihat Demo</span>
                        </a>
                    </div>
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6 mt-12 pt-8 border-t border-gray-200">
                        <div>
                            <div class="text-3xl font-bold text-wa-secondary">10K+</div>
                            <div class="text-sm text-wa-gray">UMKM Aktif</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-wa-secondary">5M+</div>
                            <div class="text-sm text-wa-gray">Pesan Terkirim</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-wa-secondary">99.9%</div>
                            <div class="text-sm text-wa-gray">Uptime</div>
                        </div>
                    </div>
                </div>

                <!-- Hero Illustration - Chat Mockup -->
                <div class="relative">
                    <div class="relative z-10 bg-wa-chat-bg rounded-3xl p-4 shadow-2xl max-w-md mx-auto">
                        <!-- Phone Header -->
                        <div class="bg-wa-secondary rounded-t-2xl px-4 py-3 flex items-center gap-3">
                            <div class="w-10 h-10 bg-wa-light rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-store text-wa-secondary"></i>
                            </div>
                            <div class="flex-1">
                                <div class="text-white font-semibold">Toko Anda</div>
                                <div class="text-wa-light text-xs">Online</div>
                            </div>
                            <i class="fa-solid fa-video text-white opacity-80"></i>
                            <i class="fa-solid fa-phone text-white opacity-80 ml-4"></i>
                        </div>
                        <!-- Chat Messages -->
                        <div class="bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23d4cdc4%22%20fill-opacity%3D%220.15%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] p-4 space-y-3 min-h-[300px]">
                            <!-- Incoming Message -->
                            <div class="flex justify-start">
                                <div class="bg-white rounded-2xl rounded-tl-sm px-4 py-2 max-w-[80%] shadow-sm">
                                    <p class="text-wa-dark text-sm">Halo, apakah produk ini ready stock?</p>
                                    <div class="text-xs text-wa-gray mt-1 text-right">10:30</div>
                                </div>
                            </div>
                            <!-- Outgoing Message -->
                            <div class="flex justify-end">
                                <div class="bg-[#D9FDD3] rounded-2xl rounded-tr-sm px-4 py-2 max-w-[80%] shadow-sm">
                                    <p class="text-wa-dark text-sm">Halo kak! Iya ready stock, mau order berapa?</p>
                                    <div class="text-xs text-wa-gray mt-1 text-right flex items-center justify-end gap-1">
                                        10:31
                                        <i class="fa-solid fa-check-double text-blue-500"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- Auto Reply Badge -->
                            <div class="flex justify-end">
                                <div class="bg-[#D9FDD3] rounded-2xl rounded-tr-sm px-4 py-2 max-w-[80%] shadow-sm">
                                    <div class="flex items-center gap-2 text-xs text-wa-primary font-medium mb-1">
                                        <i class="fa-solid fa-robot"></i>
                                        <span>Auto-Reply</span>
                                    </div>
                                    <p class="text-wa-dark text-sm">Terima kasih sudah menghubungi kami! Tim kami akan segera membalas.</p>
                                    <div class="text-xs text-wa-gray mt-1 text-right flex items-center justify-end gap-1">
                                        10:31
                                        <i class="fa-solid fa-check-double text-blue-500"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Input Area -->
                        <div class="bg-wa-light-gray rounded-b-2xl px-3 py-2 flex items-center gap-2">
                            <i class="fa-regular fa-face-smile text-wa-gray text-xl"></i>
                            <div class="flex-1 bg-white rounded-full px-4 py-2 text-sm text-wa-gray">
                                Ketik pesan...
                            </div>
                            <div class="w-10 h-10 bg-wa-primary rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-microphone text-white"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Decorative Elements -->
                    <div class="absolute -top-8 -right-8 w-32 h-32 bg-wa-primary/20 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-8 -left-8 w-40 h-40 bg-wa-secondary/20 rounded-full blur-3xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-wa-primary/10 rounded-full text-wa-secondary text-sm font-medium mb-4">
                    <i class="fa-solid fa-sparkles"></i>
                    <span>Fitur Lengkap</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-wa-dark mb-4">
                    Semua yang Anda Butuhkan untuk WhatsApp Marketing
                </h2>
                <p class="text-wa-gray max-w-2xl mx-auto">
                    Fitur-fitur canggih yang dirancang khusus untuk membantu UMKM Indonesia berkembang melalui WhatsApp.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group p-8 bg-wa-light-gray/50 rounded-3xl hover:bg-white hover:shadow-xl hover:shadow-wa-primary/10 transition-all duration-300">
                    <div class="w-14 h-14 bg-wa-primary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-wa-primary group-hover:scale-110 transition-all">
                        <i class="fa-solid fa-mobile-screen text-2xl text-wa-primary group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-wa-dark mb-3">Multi-Device Support</h3>
                    <p class="text-wa-gray">
                        Tetap terhubung tanpa perlu scan QR berulang kali. Sesi WhatsApp Anda selalu aktif 24/7.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="group p-8 bg-wa-light-gray/50 rounded-3xl hover:bg-white hover:shadow-xl hover:shadow-wa-primary/10 transition-all duration-300">
                    <div class="w-14 h-14 bg-wa-primary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-wa-primary group-hover:scale-110 transition-all">
                        <i class="fa-solid fa-paper-plane text-2xl text-wa-primary group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-wa-dark mb-3">Broadcast Massal</h3>
                    <p class="text-wa-gray">
                        Kirim pesan promosi ke ribuan kontak sekaligus dengan personalisasi nama dan variabel dinamis.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="group p-8 bg-wa-light-gray/50 rounded-3xl hover:bg-white hover:shadow-xl hover:shadow-wa-primary/10 transition-all duration-300">
                    <div class="w-14 h-14 bg-wa-primary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-wa-primary group-hover:scale-110 transition-all">
                        <i class="fa-solid fa-robot text-2xl text-wa-primary group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-wa-dark mb-3">Auto-Reply & Chatbot</h3>
                    <p class="text-wa-gray">
                        Balas pesan pelanggan secara otomatis dengan keyword matching dan flow chatbot yang fleksibel.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="group p-8 bg-wa-light-gray/50 rounded-3xl hover:bg-white hover:shadow-xl hover:shadow-wa-primary/10 transition-all duration-300">
                    <div class="w-14 h-14 bg-wa-primary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-wa-primary group-hover:scale-110 transition-all">
                        <i class="fa-solid fa-address-book text-2xl text-wa-primary group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-wa-dark mb-3">Manajemen Kontak & Label</h3>
                    <p class="text-wa-gray">
                        Kelola kontak dengan label, segmentasi pelanggan, dan catatan untuk setiap percakapan.
                    </p>
                </div>

                <!-- Feature 5 -->
                <div class="group p-8 bg-wa-light-gray/50 rounded-3xl hover:bg-white hover:shadow-xl hover:shadow-wa-primary/10 transition-all duration-300">
                    <div class="w-14 h-14 bg-wa-primary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-wa-primary group-hover:scale-110 transition-all">
                        <i class="fa-solid fa-photo-film text-2xl text-wa-primary group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-wa-dark mb-3">Kirim Media</h3>
                    <p class="text-wa-gray">
                        Kirim gambar, video, dokumen, audio, dan stiker untuk komunikasi yang lebih menarik.
                    </p>
                </div>

                <!-- Feature 6 -->
                <div class="group p-8 bg-wa-light-gray/50 rounded-3xl hover:bg-white hover:shadow-xl hover:shadow-wa-primary/10 transition-all duration-300">
                    <div class="w-14 h-14 bg-wa-primary/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-wa-primary group-hover:scale-110 transition-all">
                        <i class="fa-solid fa-code text-2xl text-wa-primary group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-wa-dark mb-3">Integrasi API</h3>
                    <p class="text-wa-gray">
                        Hubungkan dengan sistem Anda melalui REST API. Cocok untuk e-commerce, CRM, dan aplikasi lainnya.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="keuntungan" class="py-20 bg-gradient-to-br from-wa-secondary to-wa-teal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 rounded-full text-white text-sm font-medium mb-6">
                        <i class="fa-solid fa-chart-line"></i>
                        <span>Mengapa Memilih Kami</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                        Tingkatkan Bisnis UMKM Anda dengan WhatsApp CRM
                    </h2>
                    <p class="text-wa-light/90 mb-8">
                        Lebih dari sekadar aplikasi chat, IndoWhatCRM adalah solusi lengkap untuk mengelola komunikasi pelanggan dan meningkatkan penjualan.
                    </p>

                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-wa-primary rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-clock text-white"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Hemat Waktu 70%</h4>
                                <p class="text-wa-light/80 text-sm">Otomatisasi pesan berulang dan fokus pada hal yang lebih penting.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-wa-primary rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-users text-white"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Jangkau Lebih Banyak Pelanggan</h4>
                                <p class="text-wa-light/80 text-sm">Broadcast ke ribuan kontak dalam hitungan menit.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-wa-primary rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-shield-halved text-white"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Aman & Terpercaya</h4>
                                <p class="text-wa-light/80 text-sm">Data Anda terenkripsi dan tersimpan dengan aman di server Indonesia.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-wa-primary rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-headset text-white"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Support 24/7</h4>
                                <p class="text-wa-light/80 text-sm">Tim support kami siap membantu kapan saja Anda butuhkan.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Card -->
                <div class="bg-white rounded-3xl p-8 shadow-2xl">
                    <h3 class="text-2xl font-bold text-wa-dark mb-8 text-center">Dipercaya oleh UMKM Indonesia</h3>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center p-6 bg-wa-light-gray rounded-2xl">
                            <div class="text-4xl font-bold text-wa-primary mb-2">98%</div>
                            <div class="text-sm text-wa-gray">Tingkat Kepuasan</div>
                        </div>
                        <div class="text-center p-6 bg-wa-light-gray rounded-2xl">
                            <div class="text-4xl font-bold text-wa-primary mb-2">50+</div>
                            <div class="text-sm text-wa-gray">Kota di Indonesia</div>
                        </div>
                        <div class="text-center p-6 bg-wa-light-gray rounded-2xl">
                            <div class="text-4xl font-bold text-wa-primary mb-2">3x</div>
                            <div class="text-sm text-wa-gray">Peningkatan Respon</div>
                        </div>
                        <div class="text-center p-6 bg-wa-light-gray rounded-2xl">
                            <div class="text-4xl font-bold text-wa-primary mb-2">24/7</div>
                            <div class="text-sm text-wa-gray">Layanan Aktif</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="harga" class="py-20 bg-wa-light-gray">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-wa-primary/10 rounded-full text-wa-secondary text-sm font-medium mb-4">
                    <i class="fa-solid fa-tags"></i>
                    <span>Harga Terjangkau</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-wa-dark mb-4">
                    Pilih Paket yang Sesuai Kebutuhan
                </h2>
                <p class="text-wa-gray max-w-2xl mx-auto">
                    Harga transparan tanpa biaya tersembunyi. Mulai gratis dan upgrade kapan saja.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <!-- Basic Plan -->
                <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="text-center mb-8">
                        <h3 class="text-xl font-bold text-wa-dark mb-2">Starter</h3>
                        <p class="text-wa-gray text-sm mb-4">Untuk pemula</p>
                        <div class="flex items-baseline justify-center gap-1">
                            <span class="text-4xl font-bold text-wa-dark">Gratis</span>
                        </div>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3 text-wa-gray">
                            <i class="fa-solid fa-check text-wa-primary"></i>
                            <span>1 Device WhatsApp</span>
                        </li>
                        <li class="flex items-center gap-3 text-wa-gray">
                            <i class="fa-solid fa-check text-wa-primary"></i>
                            <span>100 Pesan/hari</span>
                        </li>
                        <li class="flex items-center gap-3 text-wa-gray">
                            <i class="fa-solid fa-check text-wa-primary"></i>
                            <span>Auto-Reply Dasar</span>
                        </li>
                        <li class="flex items-center gap-3 text-wa-gray">
                            <i class="fa-solid fa-check text-wa-primary"></i>
                            <span>500 Kontak</span>
                        </li>
                        <li class="flex items-center gap-3 text-wa-gray/50">
                            <i class="fa-solid fa-xmark"></i>
                            <span>Broadcast Massal</span>
                        </li>
                        <li class="flex items-center gap-3 text-wa-gray/50">
                            <i class="fa-solid fa-xmark"></i>
                            <span>API Access</span>
                        </li>
                    </ul>
                    <a href="{{ Route::has('register') ? route('register') : '#' }}" class="block w-full py-3 text-center border-2 border-wa-primary text-wa-primary font-semibold rounded-xl hover:bg-wa-primary hover:text-white transition-all">
                        Mulai Gratis
                    </a>
                </div>

                <!-- Pro Plan -->
                <div class="bg-wa-secondary rounded-3xl p-8 shadow-xl relative transform hover:scale-105 transition-transform">
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 bg-wa-primary text-white text-sm font-medium rounded-full">
                        Populer
                    </div>
                    <div class="text-center mb-8">
                        <h3 class="text-xl font-bold text-white mb-2">Pro</h3>
                        <p class="text-wa-light/80 text-sm mb-4">Untuk bisnis berkembang</p>
                        <div class="flex items-baseline justify-center gap-1">
                            <span class="text-lg text-wa-light/80">Rp</span>
                            <span class="text-4xl font-bold text-white">199K</span>
                            <span class="text-wa-light/80">/bulan</span>
                        </div>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3 text-white">
                            <i class="fa-solid fa-check text-wa-primary"></i>
                            <span>3 Device WhatsApp</span>
                        </li>
                        <li class="flex items-center gap-3 text-white">
                            <i class="fa-solid fa-check text-wa-primary"></i>
                            <span>Unlimited Pesan</span>
                        </li>
                        <li class="flex items-center gap-3 text-white">
                            <i class="fa-solid fa-check text-wa-primary"></i>
                            <span>Chatbot Advanced</span>
                        </li>
                        <li class="flex items-center gap-3 text-white">
                            <i class="fa-solid fa-check text-wa-primary"></i>
                            <span>10.000 Kontak</span>
                        </li>
                        <li class="flex items-center gap-3 text-white">
                            <i class="fa-solid fa-check text-wa-primary"></i>
                            <span>Broadcast Massal</span>
                        </li>
                        <li class="flex items-center gap-3 text-white/50">
                            <i class="fa-solid fa-xmark"></i>
                            <span>API Access</span>
                        </li>
                    </ul>
                    <a href="{{ Route::has('register') ? route('register') : '#' }}" class="block w-full py-3 text-center bg-wa-primary text-white font-semibold rounded-xl hover:bg-wa-primary-dark transition-all">
                        Pilih Pro
                    </a>
                </div>

                <!-- Enterprise Plan -->
                <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="text-center mb-8">
                        <h3 class="text-xl font-bold text-wa-dark mb-2">Enterprise</h3>
                        <p class="text-wa-gray text-sm mb-4">Untuk skala besar</p>
                        <div class="flex items-baseline justify-center gap-1">
                            <span class="text-lg text-wa-gray">Rp</span>
                            <span class="text-4xl font-bold text-wa-dark">499K</span>
                            <span class="text-wa-gray">/bulan</span>
                        </div>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3 text-wa-gray">
                            <i class="fa-solid fa-check text-wa-primary"></i>
                            <span>Unlimited Device</span>
                        </li>
                        <li class="flex items-center gap-3 text-wa-gray">
                            <i class="fa-solid fa-check text-wa-primary"></i>
                            <span>Unlimited Pesan</span>
                        </li>
                        <li class="flex items-center gap-3 text-wa-gray">
                            <i class="fa-solid fa-check text-wa-primary"></i>
                            <span>Chatbot + AI</span>
                        </li>
                        <li class="flex items-center gap-3 text-wa-gray">
                            <i class="fa-solid fa-check text-wa-primary"></i>
                            <span>Unlimited Kontak</span>
                        </li>
                        <li class="flex items-center gap-3 text-wa-gray">
                            <i class="fa-solid fa-check text-wa-primary"></i>
                            <span>Broadcast Massal</span>
                        </li>
                        <li class="flex items-center gap-3 text-wa-gray">
                            <i class="fa-solid fa-check text-wa-primary"></i>
                            <span>Full API Access</span>
                        </li>
                    </ul>
                    <a href="{{ Route::has('register') ? route('register') : '#' }}" class="block w-full py-3 text-center border-2 border-wa-primary text-wa-primary font-semibold rounded-xl hover:bg-wa-primary hover:text-white transition-all">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="bg-gradient-to-br from-wa-secondary to-wa-teal rounded-3xl p-12 relative overflow-hidden">
                <!-- Decorative -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-wa-primary/20 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>

                <div class="relative z-10">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                        Siap Meningkatkan Bisnis Anda?
                    </h2>
                    <p class="text-wa-light/90 mb-8 max-w-xl mx-auto">
                        Bergabung dengan ribuan UMKM Indonesia yang sudah menggunakan IndoWhatCRM untuk mengembangkan bisnis mereka.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ Route::has('register') ? route('register') : '#' }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-wa-secondary font-semibold rounded-2xl hover:bg-wa-light transition-all hover:shadow-xl">
                            <span>Daftar Gratis Sekarang</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-2xl hover:bg-white/10 transition-all">
                            <i class="fa-brands fa-whatsapp"></i>
                            <span>Chat dengan Kami</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-wa-dark py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                <!-- Brand -->
                <div class="md:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 bg-wa-primary rounded-xl flex items-center justify-center">
                            <i class="fa-brands fa-whatsapp text-white text-xl"></i>
                        </div>
                        <span class="text-xl font-bold text-white">IndoWhatCRM</span>
                    </div>
                    <p class="text-wa-gray mb-6 max-w-sm">
                        Platform WhatsApp CRM terbaik untuk UMKM Indonesia. Kelola komunikasi pelanggan dengan mudah dan efisien.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 bg-wa-gray/20 rounded-lg flex items-center justify-center text-wa-gray hover:bg-wa-primary hover:text-white transition-all">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-wa-gray/20 rounded-lg flex items-center justify-center text-wa-gray hover:bg-wa-primary hover:text-white transition-all">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-wa-gray/20 rounded-lg flex items-center justify-center text-wa-gray hover:bg-wa-primary hover:text-white transition-all">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-wa-gray/20 rounded-lg flex items-center justify-center text-wa-gray hover:bg-wa-primary hover:text-white transition-all">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                    </div>
                </div>

                <!-- Links -->
                <div>
                    <h4 class="text-white font-semibold mb-4">Produk</h4>
                    <ul class="space-y-3">
                        <li><a href="#fitur" class="text-wa-gray hover:text-wa-primary transition-colors">Fitur</a></li>
                        <li><a href="#harga" class="text-wa-gray hover:text-wa-primary transition-colors">Harga</a></li>
                        <li><a href="#" class="text-wa-gray hover:text-wa-primary transition-colors">API Docs</a></li>
                        <li><a href="#" class="text-wa-gray hover:text-wa-primary transition-colors">Integrasi</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-4">Perusahaan</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-wa-gray hover:text-wa-primary transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="text-wa-gray hover:text-wa-primary transition-colors">Blog</a></li>
                        <li><a href="#" class="text-wa-gray hover:text-wa-primary transition-colors">Karir</a></li>
                        <li><a href="#" class="text-wa-gray hover:text-wa-primary transition-colors">Kontak</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-wa-gray/20 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-wa-gray text-sm">
                    &copy; {{ date('Y') }} IndoWhatCRM. All rights reserved.
                </p>
                <div class="flex gap-6 text-sm">
                    <a href="#" class="text-wa-gray hover:text-wa-primary transition-colors">Privacy Policy</a>
                    <a href="#" class="text-wa-gray hover:text-wa-primary transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>

