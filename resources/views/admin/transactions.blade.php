@extends('layouts.admin')

@section('title', 'Transactions')
@section('page-title', 'Transactions')
@section('page-description', 'View all payment transactions')

@section('content')
<!-- Stats -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-check text-green-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">Rp 125.4M</p>
                <p class="text-xs text-gray-500">Total Revenue</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-receipt text-indigo-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">1,847</p>
                <p class="text-xs text-gray-500">Total Transactions</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-clock text-yellow-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">23</p>
                <p class="text-xs text-gray-500">Pending</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-xmark text-red-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">12</p>
                <p class="text-xs text-gray-500">Failed</p>
            </div>
        </div>
    </div>
</div>

<!-- Transactions Table -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row justify-between gap-4">
        <div class="flex gap-2">
            <select class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white">
                <option>All Status</option>
                <option>Success</option>
                <option>Pending</option>
                <option>Failed</option>
            </select>
            <select class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white">
                <option>All Methods</option>
                <option>Bank Transfer</option>
                <option>Credit Card</option>
                <option>E-Wallet</option>
            </select>
        </div>
        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-all flex items-center gap-2">
            <i class="fa-solid fa-file-export"></i>
            <span>Export</span>
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Transaction ID</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">User</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Plan</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Amount</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Method</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @php
                    $transactions = [
                        ['id' => 'TRX-2025112801', 'user' => 'Toko Berkah', 'plan' => 'Pro', 'amount' => 199000, 'method' => 'Bank Transfer', 'status' => 'success', 'date' => '28 Nov 2025, 10:30'],
                        ['id' => 'TRX-2025112802', 'user' => 'CV Maju Jaya', 'plan' => 'Enterprise', 'amount' => 499000, 'method' => 'Credit Card', 'status' => 'success', 'date' => '28 Nov 2025, 09:15'],
                        ['id' => 'TRX-2025112803', 'user' => 'UD Sentosa', 'plan' => 'Pro', 'amount' => 199000, 'method' => 'E-Wallet', 'status' => 'pending', 'date' => '28 Nov 2025, 08:45'],
                        ['id' => 'TRX-2025112704', 'user' => 'PT Abadi', 'plan' => 'Enterprise', 'amount' => 499000, 'method' => 'Bank Transfer', 'status' => 'success', 'date' => '27 Nov 2025, 16:20'],
                        ['id' => 'TRX-2025112705', 'user' => 'Warung Barokah', 'plan' => 'Pro', 'amount' => 199000, 'method' => 'E-Wallet', 'status' => 'failed', 'date' => '27 Nov 2025, 14:10'],
                        ['id' => 'TRX-2025112706', 'user' => 'Apotek Sehat', 'plan' => 'Pro', 'amount' => 199000, 'method' => 'Credit Card', 'status' => 'success', 'date' => '27 Nov 2025, 11:30'],
                    ];
                @endphp

                @foreach($transactions as $tx)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <code class="text-sm font-mono text-indigo-600">{{ $tx['id'] }}</code>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $tx['user'] }}</td>
                        <td class="px-6 py-4">
                            @php
                                $planColors = [
                                    'Pro' => 'bg-indigo-100 text-indigo-700',
                                    'Enterprise' => 'bg-purple-100 text-purple-700',
                                ];
                            @endphp
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $planColors[$tx['plan']] }}">
                                {{ $tx['plan'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">Rp {{ number_format($tx['amount']) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $tx['method'] }}</td>
                        <td class="px-6 py-4">
                            @php
                                $statusColors = [
                                    'success' => 'bg-green-100 text-green-700',
                                    'pending' => 'bg-yellow-100 text-yellow-700',
                                    'failed' => 'bg-red-100 text-red-700',
                                ];
                            @endphp
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $statusColors[$tx['status']] }}">
                                {{ ucfirst($tx['status']) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $tx['date'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
        <p class="text-sm text-gray-500">Showing 1-6 of 1,847 transactions</p>
        <div class="flex gap-1">
            <button class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-100 rounded-lg">Previous</button>
            <button class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-100 rounded-lg">Next</button>
        </div>
    </div>
</div>
@endsection

