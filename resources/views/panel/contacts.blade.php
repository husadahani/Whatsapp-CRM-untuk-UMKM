@extends('layouts.panel')

@section('title', 'Kontak')
@section('page-title', 'Kontak')
@section('page-description', 'Kelola daftar kontak WhatsApp Anda')

@section('page-actions')
<div class="flex gap-2">
    <button class="px-4 py-2 bg-white border border-gray-200 text-wa-dark font-medium rounded-xl transition-all hover:bg-gray-50 flex items-center gap-2">
        <i class="fa-solid fa-file-import"></i>
        <span class="hidden sm:inline">Import</span>
    </button>
    <button class="px-4 py-2 bg-wa-primary hover:bg-wa-primary-dark text-white font-medium rounded-xl transition-all flex items-center gap-2">
        <i class="fa-solid fa-plus"></i>
        <span>Tambah Kontak</span>
    </button>
</div>
@endsection

@section('content')
<!-- Filters -->
<div class="bg-white rounded-2xl shadow-sm p-4 mb-6">
    <div class="flex flex-col sm:flex-row gap-4">
        <div class="flex-1 relative">
            <i class="fa-solid fa-search absolute left-4 top-1/2 -translate-y-1/2 text-wa-gray"></i>
            <input type="text" placeholder="Cari kontak..." class="w-full pl-11 pr-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-wa-primary focus:border-transparent">
        </div>
        <div class="flex gap-2">
            <select class="px-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-wa-primary focus:border-transparent bg-white">
                <option>Semua Label</option>
                <option>Customer</option>
                <option>VIP</option>
                <option>Reseller</option>
            </select>
            <button class="px-4 py-2.5 border border-gray-200 rounded-xl hover:bg-gray-50 transition-all">
                <i class="fa-solid fa-filter text-wa-gray"></i>
            </button>
        </div>
    </div>
</div>

<!-- Contacts Table -->
<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-wa-light-gray">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-wa-gray uppercase tracking-wider">
                        <input type="checkbox" class="rounded border-gray-300 text-wa-primary focus:ring-wa-primary">
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-wa-gray uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-wa-gray uppercase tracking-wider">No. WhatsApp</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-wa-gray uppercase tracking-wider">Label</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-wa-gray uppercase tracking-wider">Terakhir Chat</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-wa-gray uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @php
                    $mockContacts = [
                        ['name' => 'Budi Santoso', 'phone' => '+62 812-3456-7890', 'label' => 'Customer', 'label_color' => 'blue', 'last_chat' => '2 menit lalu'],
                        ['name' => 'Siti Rahayu', 'phone' => '+62 813-9876-5432', 'label' => 'VIP', 'label_color' => 'yellow', 'last_chat' => '15 menit lalu'],
                        ['name' => 'Ahmad Hidayat', 'phone' => '+62 857-1234-5678', 'label' => 'Reseller', 'label_color' => 'green', 'last_chat' => '1 jam lalu'],
                        ['name' => 'Dewi Lestari', 'phone' => '+62 821-5678-9012', 'label' => 'Customer', 'label_color' => 'blue', 'last_chat' => '2 jam lalu'],
                        ['name' => 'Rudi Hermawan', 'phone' => '+62 878-4321-8765', 'label' => 'VIP', 'label_color' => 'yellow', 'last_chat' => '3 jam lalu'],
                        ['name' => 'Maya Putri', 'phone' => '+62 859-8765-4321', 'label' => 'Customer', 'label_color' => 'blue', 'last_chat' => '5 jam lalu'],
                        ['name' => 'Eko Prasetyo', 'phone' => '+62 812-1111-2222', 'label' => 'Reseller', 'label_color' => 'green', 'last_chat' => '1 hari lalu'],
                        ['name' => 'Rina Wati', 'phone' => '+62 813-3333-4444', 'label' => 'Customer', 'label_color' => 'blue', 'last_chat' => '2 hari lalu'],
                    ];
                @endphp

                @foreach($mockContacts as $contact)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded border-gray-300 text-wa-primary focus:ring-wa-primary">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-wa-primary/10 rounded-full flex items-center justify-center">
                                    <span class="text-wa-primary font-semibold">{{ substr($contact['name'], 0, 1) }}</span>
                                </div>
                                <span class="font-medium text-wa-dark">{{ $contact['name'] }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-wa-gray">{{ $contact['phone'] }}</td>
                        <td class="px-6 py-4">
                            @php
                                $labelColors = [
                                    'blue' => 'bg-blue-100 text-blue-700',
                                    'yellow' => 'bg-yellow-100 text-yellow-700',
                                    'green' => 'bg-green-100 text-green-700',
                                ];
                            @endphp
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $labelColors[$contact['label_color']] }}">
                                {{ $contact['label'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-wa-gray text-sm">{{ $contact['last_chat'] }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button class="p-2 text-wa-gray hover:text-wa-primary hover:bg-wa-primary/10 rounded-lg transition-all" title="Chat">
                                    <i class="fa-solid fa-message"></i>
                                </button>
                                <button class="p-2 text-wa-gray hover:text-wa-dark hover:bg-gray-100 rounded-lg transition-all" title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="p-2 text-wa-gray hover:text-red-600 hover:bg-red-50 rounded-lg transition-all" title="Hapus">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
        <p class="text-sm text-wa-gray">Menampilkan 1-8 dari 2,458 kontak</p>
        <div class="flex gap-1">
            <button class="px-3 py-1.5 text-sm text-wa-gray hover:bg-gray-100 rounded-lg transition-all">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button class="px-3 py-1.5 text-sm bg-wa-primary text-white rounded-lg">1</button>
            <button class="px-3 py-1.5 text-sm text-wa-gray hover:bg-gray-100 rounded-lg transition-all">2</button>
            <button class="px-3 py-1.5 text-sm text-wa-gray hover:bg-gray-100 rounded-lg transition-all">3</button>
            <span class="px-3 py-1.5 text-sm text-wa-gray">...</span>
            <button class="px-3 py-1.5 text-sm text-wa-gray hover:bg-gray-100 rounded-lg transition-all">308</button>
            <button class="px-3 py-1.5 text-sm text-wa-gray hover:bg-gray-100 rounded-lg transition-all">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>
@endsection

