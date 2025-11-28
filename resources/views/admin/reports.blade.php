@extends('layouts.admin')

@section('title', 'Reports')
@section('page-title', 'Reports & Analytics')
@section('page-description', 'View detailed reports and analytics')

@section('content')
<!-- Quick Stats -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm text-gray-500">Revenue (MTD)</span>
            <span class="text-xs text-green-600 bg-green-100 px-2 py-0.5 rounded-full">+12.5%</span>
        </div>
        <p class="text-2xl font-bold text-gray-900">Rp 45.8M</p>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm text-gray-500">New Users (MTD)</span>
            <span class="text-xs text-green-600 bg-green-100 px-2 py-0.5 rounded-full">+8.3%</span>
        </div>
        <p class="text-2xl font-bold text-gray-900">234</p>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm text-gray-500">Messages (MTD)</span>
            <span class="text-xs text-green-600 bg-green-100 px-2 py-0.5 rounded-full">+15.2%</span>
        </div>
        <p class="text-2xl font-bold text-gray-900">1.5M</p>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm text-gray-500">Churn Rate</span>
            <span class="text-xs text-red-600 bg-red-100 px-2 py-0.5 rounded-full">+0.2%</span>
        </div>
        <p class="text-2xl font-bold text-gray-900">2.4%</p>
    </div>
</div>

<div class="grid lg:grid-cols-2 gap-6 mb-6">
    <!-- Revenue Chart -->
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-bold text-gray-900">Revenue Trend</h2>
            <select class="text-sm border border-gray-200 rounded-lg px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option>Last 30 days</option>
                <option>Last 3 months</option>
                <option>Last 12 months</option>
            </select>
        </div>
        <div class="p-4">
            <div class="h-64 bg-gray-50 rounded-lg flex items-center justify-center">
                <p class="text-gray-400">Revenue Chart Placeholder</p>
            </div>
        </div>
    </div>

    <!-- User Growth Chart -->
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-bold text-gray-900">User Growth</h2>
            <select class="text-sm border border-gray-200 rounded-lg px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option>Last 30 days</option>
                <option>Last 3 months</option>
                <option>Last 12 months</option>
            </select>
        </div>
        <div class="p-4">
            <div class="h-64 bg-gray-50 rounded-lg flex items-center justify-center">
                <p class="text-gray-400">User Growth Chart Placeholder</p>
            </div>
        </div>
    </div>
</div>

<!-- Export Reports -->
<div class="bg-white rounded-xl shadow-sm">
    <div class="p-4 border-b border-gray-100">
        <h2 class="font-bold text-gray-900">Export Reports</h2>
    </div>
    <div class="p-4">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="p-4 border border-gray-200 rounded-xl hover:border-indigo-300 hover:bg-indigo-50/50 transition-all cursor-pointer group">
                <div class="w-10 h-10 bg-green-100 group-hover:bg-green-200 rounded-lg flex items-center justify-center mb-3 transition-colors">
                    <i class="fa-solid fa-file-excel text-green-600"></i>
                </div>
                <h3 class="font-medium text-gray-900 mb-1">Revenue Report</h3>
                <p class="text-xs text-gray-500 mb-3">Export revenue data as Excel</p>
                <button class="text-sm text-indigo-600 hover:text-indigo-700 font-medium flex items-center gap-1">
                    <i class="fa-solid fa-download"></i>
                    <span>Download</span>
                </button>
            </div>
            <div class="p-4 border border-gray-200 rounded-xl hover:border-indigo-300 hover:bg-indigo-50/50 transition-all cursor-pointer group">
                <div class="w-10 h-10 bg-blue-100 group-hover:bg-blue-200 rounded-lg flex items-center justify-center mb-3 transition-colors">
                    <i class="fa-solid fa-users text-blue-600"></i>
                </div>
                <h3 class="font-medium text-gray-900 mb-1">Users Report</h3>
                <p class="text-xs text-gray-500 mb-3">Export user data as CSV</p>
                <button class="text-sm text-indigo-600 hover:text-indigo-700 font-medium flex items-center gap-1">
                    <i class="fa-solid fa-download"></i>
                    <span>Download</span>
                </button>
            </div>
            <div class="p-4 border border-gray-200 rounded-xl hover:border-indigo-300 hover:bg-indigo-50/50 transition-all cursor-pointer group">
                <div class="w-10 h-10 bg-purple-100 group-hover:bg-purple-200 rounded-lg flex items-center justify-center mb-3 transition-colors">
                    <i class="fa-solid fa-paper-plane text-purple-600"></i>
                </div>
                <h3 class="font-medium text-gray-900 mb-1">Messages Report</h3>
                <p class="text-xs text-gray-500 mb-3">Export message logs</p>
                <button class="text-sm text-indigo-600 hover:text-indigo-700 font-medium flex items-center gap-1">
                    <i class="fa-solid fa-download"></i>
                    <span>Download</span>
                </button>
            </div>
            <div class="p-4 border border-gray-200 rounded-xl hover:border-indigo-300 hover:bg-indigo-50/50 transition-all cursor-pointer group">
                <div class="w-10 h-10 bg-orange-100 group-hover:bg-orange-200 rounded-lg flex items-center justify-center mb-3 transition-colors">
                    <i class="fa-solid fa-chart-pie text-orange-600"></i>
                </div>
                <h3 class="font-medium text-gray-900 mb-1">Full Analytics</h3>
                <p class="text-xs text-gray-500 mb-3">Complete analytics report</p>
                <button class="text-sm text-indigo-600 hover:text-indigo-700 font-medium flex items-center gap-1">
                    <i class="fa-solid fa-download"></i>
                    <span>Download</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Top Users -->
<div class="bg-white rounded-xl shadow-sm mt-6">
    <div class="p-4 border-b border-gray-100">
        <h2 class="font-bold text-gray-900">Top Users by Revenue</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">#</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">User</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Plan</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Total Revenue</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Messages Sent</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @php
                    $topUsers = [
                        ['rank' => 1, 'name' => 'PT Abadi Sentosa', 'plan' => 'Enterprise', 'revenue' => 5988000, 'messages' => 125000],
                        ['rank' => 2, 'name' => 'CV Maju Bersama', 'plan' => 'Enterprise', 'revenue' => 4990000, 'messages' => 98000],
                        ['rank' => 3, 'name' => 'Toko Berkah Jaya', 'plan' => 'Pro', 'revenue' => 2388000, 'messages' => 45000],
                        ['rank' => 4, 'name' => 'UD Sentosa Abadi', 'plan' => 'Pro', 'revenue' => 1990000, 'messages' => 38000],
                        ['rank' => 5, 'name' => 'Apotek Sehat Selalu', 'plan' => 'Pro', 'revenue' => 1592000, 'messages' => 32000],
                    ];
                @endphp
                @foreach($topUsers as $user)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <span class="w-6 h-6 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-xs font-bold">{{ $user['rank'] }}</span>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $user['name'] }}</td>
                        <td class="px-6 py-4">
                            @php
                                $planColors = [
                                    'Pro' => 'bg-indigo-100 text-indigo-700',
                                    'Enterprise' => 'bg-purple-100 text-purple-700',
                                ];
                            @endphp
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $planColors[$user['plan']] }}">
                                {{ $user['plan'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">Rp {{ number_format($user['revenue']) }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ number_format($user['messages']) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

