@extends('layouts.admin')

@section('title', 'Subscriptions')
@section('page-title', 'Subscriptions')
@section('page-description', 'Manage user subscriptions and billing')

@section('content')
<!-- Stats -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-credit-card text-green-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">892</p>
                <p class="text-xs text-gray-500">Active Subs</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-dollar-sign text-indigo-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">Rp 45.8M</p>
                <p class="text-xs text-gray-500">MRR</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-clock text-yellow-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">45</p>
                <p class="text-xs text-gray-500">Expiring Soon</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-arrow-trend-down text-red-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">2.4%</p>
                <p class="text-xs text-gray-500">Churn Rate</p>
            </div>
        </div>
    </div>
</div>

<!-- Subscriptions Table -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row justify-between gap-4">
        <div class="flex gap-2">
            <select class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white">
                <option>All Plans</option>
                <option>Starter</option>
                <option>Pro</option>
                <option>Enterprise</option>
            </select>
            <select class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white">
                <option>All Status</option>
                <option>Active</option>
                <option>Cancelled</option>
                <option>Expired</option>
            </select>
        </div>
        <div class="relative">
            <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">User</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Plan</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Amount</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Next Billing</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @php
                    $subscriptions = [
                        ['user' => 'Toko Berkah Jaya', 'email' => 'toko@berkah.com', 'plan' => 'Pro', 'amount' => 199000, 'status' => 'active', 'next_billing' => '15 Dec 2025'],
                        ['user' => 'CV Maju Bersama', 'email' => 'cv@maju.com', 'plan' => 'Enterprise', 'amount' => 499000, 'status' => 'active', 'next_billing' => '12 Dec 2025'],
                        ['user' => 'UD Sentosa', 'email' => 'ud@sentosa.com', 'plan' => 'Pro', 'amount' => 199000, 'status' => 'active', 'next_billing' => '10 Dec 2025'],
                        ['user' => 'Warung Barokah', 'email' => 'warung@barokah.com', 'plan' => 'Starter', 'amount' => 0, 'status' => 'trial', 'next_billing' => '8 Dec 2025'],
                        ['user' => 'PT Abadi Sentosa', 'email' => 'pt@abadi.com', 'plan' => 'Enterprise', 'amount' => 499000, 'status' => 'active', 'next_billing' => '5 Dec 2025'],
                        ['user' => 'Toko Online Shop', 'email' => 'toko@online.com', 'plan' => 'Pro', 'amount' => 199000, 'status' => 'cancelled', 'next_billing' => '-'],
                    ];
                @endphp

                @foreach($subscriptions as $sub)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                    <span class="text-indigo-600 font-medium">{{ substr($sub['user'], 0, 1) }}</span>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">{{ $sub['user'] }}</p>
                                    <p class="text-sm text-gray-500">{{ $sub['email'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $planColors = [
                                    'Starter' => 'bg-gray-100 text-gray-700',
                                    'Pro' => 'bg-indigo-100 text-indigo-700',
                                    'Enterprise' => 'bg-purple-100 text-purple-700',
                                ];
                            @endphp
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $planColors[$sub['plan']] }}">
                                {{ $sub['plan'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $sub['amount'] > 0 ? 'Rp ' . number_format($sub['amount']) : 'Free' }}
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusColors = [
                                    'active' => 'bg-green-100 text-green-700',
                                    'trial' => 'bg-yellow-100 text-yellow-700',
                                    'cancelled' => 'bg-red-100 text-red-700',
                                ];
                            @endphp
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $statusColors[$sub['status']] }}">
                                {{ ucfirst($sub['status']) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $sub['next_billing'] }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">
                                <button class="p-2 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all" title="View">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-all" title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
        <p class="text-sm text-gray-500">Showing 1-6 of 892 subscriptions</p>
        <div class="flex gap-1">
            <button class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-100 rounded-lg">Previous</button>
            <button class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-100 rounded-lg">Next</button>
        </div>
    </div>
</div>
@endsection

