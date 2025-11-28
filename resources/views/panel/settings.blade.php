@extends('layouts.panel')

@section('title', 'Pengaturan')
@section('page-title', 'Pengaturan')
@section('page-description', 'Kelola pengaturan akun dan aplikasi')

@section('content')
<div class="grid lg:grid-cols-3 gap-6">
    <!-- Sidebar Menu -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl shadow-sm p-2">
            <nav class="space-y-1">
                <a href="#profile" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-wa-primary/10 text-wa-primary font-medium">
                    <i class="fa-solid fa-user w-5 text-center"></i>
                    <span>Profil</span>
                </a>
                <a href="#security" class="flex items-center gap-3 px-4 py-3 rounded-xl text-wa-gray hover:bg-gray-50 transition-all">
                    <i class="fa-solid fa-shield-halved w-5 text-center"></i>
                    <span>Keamanan</span>
                </a>
                <a href="#notifications" class="flex items-center gap-3 px-4 py-3 rounded-xl text-wa-gray hover:bg-gray-50 transition-all">
                    <i class="fa-solid fa-bell w-5 text-center"></i>
                    <span>Notifikasi</span>
                </a>
                <a href="#billing" class="flex items-center gap-3 px-4 py-3 rounded-xl text-wa-gray hover:bg-gray-50 transition-all">
                    <i class="fa-solid fa-credit-card w-5 text-center"></i>
                    <span>Billing</span>
                </a>
            </nav>
        </div>
    </div>

    <!-- Settings Content -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Profile Section -->
        <div id="profile" class="bg-white rounded-2xl shadow-sm p-6">
            <h2 class="text-lg font-bold text-wa-dark mb-6">Profil</h2>

            <div class="flex items-center gap-4 mb-6">
                <div class="w-20 h-20 bg-wa-primary rounded-full flex items-center justify-center">
                    <span class="text-white text-2xl font-bold">{{ substr(Auth::user()->name ?? 'U', 0, 1) }}</span>
                </div>
                <div>
                    <button class="px-4 py-2 bg-wa-primary hover:bg-wa-primary-dark text-white text-sm font-medium rounded-lg transition-all">
                        Upload Foto
                    </button>
                    <p class="text-xs text-wa-gray mt-2">JPG, PNG max 2MB</p>
                </div>
            </div>

            <form class="space-y-4">
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-wa-dark mb-2">Nama Lengkap</label>
                        <input type="text" value="{{ Auth::user()->name ?? 'User' }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-wa-primary focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-wa-dark mb-2">Email</label>
                        <input type="email" value="{{ Auth::user()->email ?? 'user@email.com' }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-wa-primary focus:border-transparent">
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-wa-dark mb-2">No. Telepon</label>
                        <input type="tel" value="+62 812-3456-7890" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-wa-primary focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-wa-dark mb-2">Nama Bisnis</label>
                        <input type="text" value="Toko Berkah Jaya" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-wa-primary focus:border-transparent">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-wa-dark mb-2">Alamat</label>
                    <textarea rows="3" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-wa-primary focus:border-transparent resize-none">Jl. Sudirman No. 123, Jakarta Selatan</textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2.5 bg-wa-primary hover:bg-wa-primary-dark text-white font-medium rounded-xl transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <!-- Security Section -->
        <div id="security" class="bg-white rounded-2xl shadow-sm p-6">
            <h2 class="text-lg font-bold text-wa-dark mb-6">Keamanan</h2>

            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-wa-dark mb-2">Password Lama</label>
                    <input type="password" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-wa-primary focus:border-transparent" placeholder="••••••••">
                </div>
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-wa-dark mb-2">Password Baru</label>
                        <input type="password" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-wa-primary focus:border-transparent" placeholder="••••••••">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-wa-dark mb-2">Konfirmasi Password</label>
                        <input type="password" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-wa-primary focus:border-transparent" placeholder="••••••••">
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2.5 bg-wa-primary hover:bg-wa-primary-dark text-white font-medium rounded-xl transition-all">
                        Update Password
                    </button>
                </div>
            </form>
        </div>

        <!-- Notifications Section -->
        <div id="notifications" class="bg-white rounded-2xl shadow-sm p-6">
            <h2 class="text-lg font-bold text-wa-dark mb-6">Notifikasi</h2>

            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 bg-wa-light-gray rounded-xl">
                    <div>
                        <h4 class="font-medium text-wa-dark">Email Notifikasi</h4>
                        <p class="text-sm text-wa-gray">Terima notifikasi via email</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-wa-primary/50 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-wa-primary"></div>
                    </label>
                </div>
                <div class="flex items-center justify-between p-4 bg-wa-light-gray rounded-xl">
                    <div>
                        <h4 class="font-medium text-wa-dark">WhatsApp Notifikasi</h4>
                        <p class="text-sm text-wa-gray">Terima notifikasi via WhatsApp</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-wa-primary/50 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-wa-primary"></div>
                    </label>
                </div>
                <div class="flex items-center justify-between p-4 bg-wa-light-gray rounded-xl">
                    <div>
                        <h4 class="font-medium text-wa-dark">Broadcast Report</h4>
                        <p class="text-sm text-wa-gray">Laporan setelah broadcast selesai</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-wa-primary/50 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-wa-primary"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

