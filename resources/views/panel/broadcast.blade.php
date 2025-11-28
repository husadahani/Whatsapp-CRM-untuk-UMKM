@extends('layouts.panel')

@section('title', 'Broadcast')
@section('page-title', 'Broadcast')
@section('page-description', 'Kirim pesan massal ke banyak kontak')

@section('page-actions')
<button class="px-4 py-2 bg-wa-primary hover:bg-wa-primary-dark text-white font-medium rounded-xl transition-all flex items-center gap-2">
    <i class="fa-solid fa-plus"></i>
    <span>Buat Broadcast</span>
</button>
@endsection

@section('content')
<!-- Stats -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-wa-primary/10 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-paper-plane text-wa-primary"></i>
            </div>
            <div>
                <p class="text-2xl font-bold text-wa-dark">24</p>
                <p class="text-xs text-wa-gray">Total Broadcast</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-check text-green-600"></i>
            </div>
            <div>
                <p class="text-2xl font-bold text-wa-dark">18</p>
                <p class="text-xs text-wa-gray">Selesai</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-clock text-blue-600"></i>
            </div>
            <div>
                <p class="text-2xl font-bold text-wa-dark">4</p>
                <p class="text-xs text-wa-gray">Terjadwal</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-spinner text-orange-600"></i>
            </div>
            <div>
                <p class="text-2xl font-bold text-wa-dark">2</p>
                <p class="text-xs text-wa-gray">Berjalan</p>
            </div>
        </div>
    </div>
</div>

<!-- Broadcast List -->
<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <h2 class="font-bold text-wa-dark">Riwayat Broadcast</h2>
        <div class="flex gap-2">
            <select class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-wa-primary bg-white">
                <option>Semua Status</option>
                <option>Selesai</option>
                <option>Terjadwal</option>
                <option>Berjalan</option>
            </select>
        </div>
    </div>

    <div class="divide-y divide-gray-100">
        @php
            $mockBroadcasts = [
                ['name' => 'Promo Akhir Tahun', 'recipients' => 1250, 'sent' => 1250, 'failed' => 12, 'status' => 'completed', 'date' => '28 Nov 2025, 10:00'],
                ['name' => 'Info Produk Baru', 'recipients' => 856, 'sent' => 0, 'failed' => 0, 'status' => 'scheduled', 'date' => '30 Nov 2025, 09:00'],
                ['name' => 'Flash Sale Weekend', 'recipients' => 2100, 'sent' => 1456, 'failed' => 5, 'status' => 'running', 'date' => '28 Nov 2025, 14:30'],
                ['name' => 'Ucapan Terima Kasih', 'recipients' => 500, 'sent' => 500, 'failed' => 0, 'status' => 'completed', 'date' => '25 Nov 2025, 08:00'],
                ['name' => 'Reminder Payment', 'recipients' => 45, 'sent' => 45, 'failed' => 2, 'status' => 'completed', 'date' => '24 Nov 2025, 15:00'],
            ];
        @endphp

        @foreach($mockBroadcasts as $broadcast)
            <div class="p-4 lg:px-6 hover:bg-gray-50 transition-colors">
                <div class="flex flex-col lg:flex-row lg:items-center gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="font-semibold text-wa-dark">{{ $broadcast['name'] }}</h3>
                            @php
                                $statusColors = [
                                    'completed' => 'bg-green-100 text-green-700',
                                    'scheduled' => 'bg-blue-100 text-blue-700',
                                    'running' => 'bg-orange-100 text-orange-700',
                                ];
                                $statusLabels = [
                                    'completed' => 'Selesai',
                                    'scheduled' => 'Terjadwal',
                                    'running' => 'Berjalan',
                                ];
                            @endphp
                            <span class="px-2 py-0.5 text-xs font-medium rounded-full {{ $statusColors[$broadcast['status']] }}">
                                {{ $statusLabels[$broadcast['status']] }}
                            </span>
                        </div>
                        <p class="text-sm text-wa-gray">
                            <i class="fa-regular fa-calendar mr-1"></i> {{ $broadcast['date'] }}
                        </p>
                    </div>

                    <div class="flex items-center gap-6">
                        <div class="text-center">
                            <p class="text-lg font-bold text-wa-dark">{{ number_format($broadcast['recipients']) }}</p>
                            <p class="text-xs text-wa-gray">Penerima</p>
                        </div>
                        <div class="text-center">
                            <p class="text-lg font-bold text-green-600">{{ number_format($broadcast['sent']) }}</p>
                            <p class="text-xs text-wa-gray">Terkirim</p>
                        </div>
                        <div class="text-center">
                            <p class="text-lg font-bold text-red-600">{{ $broadcast['failed'] }}</p>
                            <p class="text-xs text-wa-gray">Gagal</p>
                        </div>

                        @if($broadcast['status'] === 'running')
                            <div class="w-24">
                                <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-wa-primary rounded-full" style="width: {{ ($broadcast['sent'] / $broadcast['recipients']) * 100 }}%"></div>
                                </div>
                                <p class="text-xs text-wa-gray mt-1 text-center">{{ round(($broadcast['sent'] / $broadcast['recipients']) * 100) }}%</p>
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center gap-2">
                        <button class="p-2 text-wa-gray hover:text-wa-dark hover:bg-gray-100 rounded-lg transition-all" title="Detail">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                        @if($broadcast['status'] === 'scheduled')
                            <button class="p-2 text-wa-gray hover:text-wa-dark hover:bg-gray-100 rounded-lg transition-all" title="Edit">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                        @endif
                        <button class="p-2 text-wa-gray hover:text-red-600 hover:bg-red-50 rounded-lg transition-all" title="Hapus">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

