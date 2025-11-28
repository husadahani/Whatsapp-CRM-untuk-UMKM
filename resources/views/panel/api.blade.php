@extends('layouts.panel')

@section('title', 'API')
@section('page-title', 'API')
@section('page-description', 'Kelola API keys dan dokumentasi')

@section('page-actions')
<button class="px-4 py-2 bg-wa-primary hover:bg-wa-primary-dark text-white font-medium rounded-xl transition-all flex items-center gap-2">
    <i class="fa-solid fa-plus"></i>
    <span>Generate Key</span>
</button>
@endsection

@section('content')
<div class="grid lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
        <!-- API Keys -->
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-lg font-bold text-wa-dark">API Keys</h2>
                <p class="text-sm text-wa-gray mt-1">Kelola API keys untuk mengakses layanan kami</p>
            </div>

            <div class="divide-y divide-gray-100">
                @php
                    $mockKeys = [
                        ['name' => 'Production Key', 'key' => 'iwcrm_prod_xxxxxxxxxxxxxxxxxxxx', 'created' => '15 Nov 2025', 'last_used' => '2 menit lalu', 'status' => 'active'],
                        ['name' => 'Development Key', 'key' => 'iwcrm_dev_xxxxxxxxxxxxxxxxxxxxx', 'created' => '10 Nov 2025', 'last_used' => '1 jam lalu', 'status' => 'active'],
                        ['name' => 'Testing Key', 'key' => 'iwcrm_test_xxxxxxxxxxxxxxxxxxxx', 'created' => '5 Nov 2025', 'last_used' => '5 hari lalu', 'status' => 'inactive'],
                    ];
                @endphp

                @foreach($mockKeys as $apiKey)
                    <div class="p-6">
                        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                            <div>
                                <div class="flex items-center gap-3 mb-2">
                                    <h3 class="font-semibold text-wa-dark">{{ $apiKey['name'] }}</h3>
                                    <span class="px-2 py-0.5 text-xs font-medium rounded-full {{ $apiKey['status'] === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                        {{ $apiKey['status'] === 'active' ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-2 mb-2">
                                    <code class="px-3 py-1.5 bg-wa-light-gray rounded-lg text-sm font-mono text-wa-gray">{{ $apiKey['key'] }}</code>
                                    <button class="p-1.5 text-wa-gray hover:text-wa-dark hover:bg-gray-100 rounded transition-all" title="Copy">
                                        <i class="fa-regular fa-copy"></i>
                                    </button>
                                </div>
                                <p class="text-xs text-wa-gray">
                                    Dibuat: {{ $apiKey['created'] }} • Terakhir digunakan: {{ $apiKey['last_used'] }}
                                </p>
                            </div>
                            <div class="flex items-center gap-2">
                                <button class="px-3 py-1.5 text-sm text-wa-gray hover:text-wa-dark hover:bg-gray-100 rounded-lg transition-all">
                                    <i class="fa-solid fa-rotate mr-1"></i> Regenerate
                                </button>
                                <button class="px-3 py-1.5 text-sm text-red-600 hover:bg-red-50 rounded-lg transition-all">
                                    <i class="fa-solid fa-trash mr-1"></i> Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- API Usage -->
        <div class="bg-white rounded-2xl shadow-sm p-6">
            <h2 class="text-lg font-bold text-wa-dark mb-4">Penggunaan API</h2>

            <div class="grid grid-cols-3 gap-4 mb-6">
                <div class="p-4 bg-wa-light-gray rounded-xl text-center">
                    <p class="text-2xl font-bold text-wa-dark">12,456</p>
                    <p class="text-xs text-wa-gray">Request Hari Ini</p>
                </div>
                <div class="p-4 bg-wa-light-gray rounded-xl text-center">
                    <p class="text-2xl font-bold text-wa-dark">98.5%</p>
                    <p class="text-xs text-wa-gray">Success Rate</p>
                </div>
                <div class="p-4 bg-wa-light-gray rounded-xl text-center">
                    <p class="text-2xl font-bold text-wa-dark">45ms</p>
                    <p class="text-xs text-wa-gray">Avg Response</p>
                </div>
            </div>

            <div class="h-48 bg-wa-light-gray rounded-xl flex items-center justify-center">
                <p class="text-wa-gray">Chart placeholder</p>
            </div>
        </div>
    </div>

    <!-- Documentation -->
    <div class="space-y-6">
        <div class="bg-white rounded-2xl shadow-sm p-6">
            <h2 class="text-lg font-bold text-wa-dark mb-4">Quick Start</h2>

            <div class="space-y-4">
                <div>
                    <p class="text-sm font-medium text-wa-dark mb-2">Base URL</p>
                    <code class="block px-3 py-2 bg-wa-light-gray rounded-lg text-sm font-mono text-wa-gray break-all">
                        https://api.indowhatcrm.com/v1
                    </code>
                </div>

                <div>
                    <p class="text-sm font-medium text-wa-dark mb-2">Authentication</p>
                    <code class="block px-3 py-2 bg-wa-light-gray rounded-lg text-sm font-mono text-wa-gray break-all">
                        Authorization: Bearer YOUR_API_KEY
                    </code>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6">
            <h2 class="text-lg font-bold text-wa-dark mb-4">Endpoints</h2>

            <div class="space-y-3">
                <div class="p-3 bg-wa-light-gray rounded-xl">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="px-2 py-0.5 text-xs font-medium bg-green-100 text-green-700 rounded">POST</span>
                        <span class="text-sm font-mono text-wa-dark">/send-message</span>
                    </div>
                    <p class="text-xs text-wa-gray">Kirim pesan ke nomor WhatsApp</p>
                </div>
                <div class="p-3 bg-wa-light-gray rounded-xl">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="px-2 py-0.5 text-xs font-medium bg-blue-100 text-blue-700 rounded">GET</span>
                        <span class="text-sm font-mono text-wa-dark">/contacts</span>
                    </div>
                    <p class="text-xs text-wa-gray">Ambil daftar kontak</p>
                </div>
                <div class="p-3 bg-wa-light-gray rounded-xl">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="px-2 py-0.5 text-xs font-medium bg-green-100 text-green-700 rounded">POST</span>
                        <span class="text-sm font-mono text-wa-dark">/broadcast</span>
                    </div>
                    <p class="text-xs text-wa-gray">Kirim broadcast massal</p>
                </div>
                <div class="p-3 bg-wa-light-gray rounded-xl">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="px-2 py-0.5 text-xs font-medium bg-blue-100 text-blue-700 rounded">GET</span>
                        <span class="text-sm font-mono text-wa-dark">/devices</span>
                    </div>
                    <p class="text-xs text-wa-gray">Status device WhatsApp</p>
                </div>
            </div>

            <a href="#" class="mt-4 flex items-center justify-center gap-2 w-full py-2.5 border border-wa-primary text-wa-primary font-medium rounded-xl hover:bg-wa-primary hover:text-white transition-all">
                <i class="fa-solid fa-book"></i>
                <span>Dokumentasi Lengkap</span>
            </a>
        </div>
    </div>
</div>
@endsection

