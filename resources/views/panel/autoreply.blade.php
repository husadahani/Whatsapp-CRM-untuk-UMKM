@extends('layouts.panel')

@section('title', 'Auto Reply')
@section('page-title', 'Auto Reply')
@section('page-description', 'Atur balasan otomatis untuk pesan masuk')

@section('page-actions')
<button class="px-4 py-2 bg-wa-primary hover:bg-wa-primary-dark text-white font-medium rounded-xl transition-all flex items-center gap-2">
    <i class="fa-solid fa-plus"></i>
    <span>Tambah Rule</span>
</button>
@endsection

@section('content')
<!-- Stats -->
<div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-wa-primary/10 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-robot text-wa-primary"></i>
            </div>
            <div>
                <p class="text-2xl font-bold text-wa-dark">12</p>
                <p class="text-xs text-wa-gray">Total Rules</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-check text-green-600"></i>
            </div>
            <div>
                <p class="text-2xl font-bold text-wa-dark">8</p>
                <p class="text-xs text-wa-gray">Aktif</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm col-span-2 lg:col-span-1">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-reply text-blue-600"></i>
            </div>
            <div>
                <p class="text-2xl font-bold text-wa-dark">3,456</p>
                <p class="text-xs text-wa-gray">Pesan Dibalas</p>
            </div>
        </div>
    </div>
</div>

<!-- Auto Reply Rules -->
<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
    <div class="p-4 border-b border-gray-100">
        <h2 class="font-bold text-wa-dark">Daftar Rules</h2>
    </div>

    <div class="divide-y divide-gray-100">
        @php
            $mockRules = [
                ['keyword' => 'harga', 'reply' => 'Halo kak! Untuk info harga produk kami, silakan kunjungi katalog kami di...', 'type' => 'contains', 'active' => true, 'triggered' => 856],
                ['keyword' => 'order', 'reply' => 'Terima kasih sudah order! Silakan kirim bukti transfer ke nomor ini...', 'type' => 'contains', 'active' => true, 'triggered' => 1234],
                ['keyword' => 'hai|halo|hello', 'reply' => 'Halo kak! Selamat datang di Toko Kami. Ada yang bisa kami bantu?', 'type' => 'regex', 'active' => true, 'triggered' => 567],
                ['keyword' => 'rekening', 'reply' => 'Berikut nomor rekening kami:\nBCA: 1234567890\nMandiri: 0987654321', 'type' => 'exact', 'active' => true, 'triggered' => 234],
                ['keyword' => 'promo', 'reply' => 'Promo bulan ini: Diskon 20% untuk pembelian minimal 3 pcs!', 'type' => 'contains', 'active' => false, 'triggered' => 89],
                ['keyword' => 'alamat', 'reply' => 'Alamat toko kami: Jl. Sudirman No. 123, Jakarta Selatan', 'type' => 'contains', 'active' => true, 'triggered' => 156],
            ];
        @endphp

        @foreach($mockRules as $rule)
            <div class="p-4 lg:px-6 hover:bg-gray-50 transition-colors">
                <div class="flex flex-col lg:flex-row lg:items-start gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="px-3 py-1 bg-wa-secondary/10 rounded-lg">
                                <code class="text-sm font-mono text-wa-secondary">{{ $rule['keyword'] }}</code>
                            </div>
                            @php
                                $typeLabels = [
                                    'contains' => 'Mengandung',
                                    'exact' => 'Persis',
                                    'regex' => 'Regex',
                                ];
                            @endphp
                            <span class="text-xs text-wa-gray bg-gray-100 px-2 py-1 rounded">{{ $typeLabels[$rule['type']] }}</span>
                        </div>
                        <p class="text-sm text-wa-gray line-clamp-2">{{ $rule['reply'] }}</p>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="text-center">
                            <p class="text-lg font-bold text-wa-dark">{{ number_format($rule['triggered']) }}</p>
                            <p class="text-xs text-wa-gray">Triggered</p>
                        </div>

                        <!-- Toggle -->
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" {{ $rule['active'] ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-wa-primary/50 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-wa-primary"></div>
                        </label>

                        <div class="flex items-center gap-1">
                            <button class="p-2 text-wa-gray hover:text-wa-dark hover:bg-gray-100 rounded-lg transition-all" title="Edit">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button class="p-2 text-wa-gray hover:text-red-600 hover:bg-red-50 rounded-lg transition-all" title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

