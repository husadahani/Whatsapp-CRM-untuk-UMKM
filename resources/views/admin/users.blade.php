@extends('layouts.admin')

@section('title', 'Users')
@section('page-title', 'Users Management')
@section('page-description', 'Manage all registered users')

@section('content')
<!-- Stats -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-users text-indigo-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">1,256</p>
                <p class="text-xs text-gray-500">Total Users</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-user-check text-green-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">892</p>
                <p class="text-xs text-gray-500">Active</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-user-clock text-yellow-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">234</p>
                <p class="text-xs text-gray-500">Trial</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-user-xmark text-red-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">130</p>
                <p class="text-xs text-gray-500">Inactive</p>
            </div>
        </div>
    </div>
</div>

<!-- Filters & Actions -->
<div class="bg-white rounded-xl shadow-sm p-4 mb-6">
    <div class="flex flex-col lg:flex-row gap-4 justify-between">
        <div class="flex flex-col sm:flex-row gap-3 flex-1">
            <div class="relative flex-1 max-w-md">
                <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" placeholder="Search users..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
            </div>
            <select class="px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm bg-white">
                <option>All Status</option>
                <option>Active</option>
                <option>Trial</option>
                <option>Inactive</option>
            </select>
            <select class="px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm bg-white">
                <option>All Plans</option>
                <option>Starter</option>
                <option>Pro</option>
                <option>Enterprise</option>
            </select>
        </div>
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-all flex items-center gap-2 text-sm">
                <i class="fa-solid fa-file-export"></i>
                <span>Export</span>
            </button>
            <button class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-all flex items-center gap-2 text-sm">
                <i class="fa-solid fa-plus"></i>
                <span>Add User</span>
            </button>
        </div>
    </div>
</div>

<!-- Users Table -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">User</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Plan</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Devices</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Joined</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @php
                    $users = [
                        ['name' => 'Toko Berkah Jaya', 'email' => 'toko@berkah.com', 'plan' => 'Pro', 'devices' => 3, 'status' => 'active', 'joined' => '15 Nov 2025'],
                        ['name' => 'CV Maju Bersama', 'email' => 'cv@maju.com', 'plan' => 'Enterprise', 'devices' => 8, 'status' => 'active', 'joined' => '12 Nov 2025'],
                        ['name' => 'UD Sentosa', 'email' => 'ud@sentosa.com', 'plan' => 'Pro', 'devices' => 2, 'status' => 'active', 'joined' => '10 Nov 2025'],
                        ['name' => 'Warung Barokah', 'email' => 'warung@barokah.com', 'plan' => 'Starter', 'devices' => 1, 'status' => 'trial', 'joined' => '8 Nov 2025'],
                        ['name' => 'PT Abadi Sentosa', 'email' => 'pt@abadi.com', 'plan' => 'Enterprise', 'devices' => 12, 'status' => 'active', 'joined' => '5 Nov 2025'],
                        ['name' => 'Toko Online Shop', 'email' => 'toko@online.com', 'plan' => 'Pro', 'devices' => 3, 'status' => 'inactive', 'joined' => '1 Nov 2025'],
                        ['name' => 'Butik Cantik', 'email' => 'butik@cantik.com', 'plan' => 'Starter', 'devices' => 1, 'status' => 'trial', 'joined' => '28 Oct 2025'],
                        ['name' => 'Apotek Sehat', 'email' => 'apotek@sehat.com', 'plan' => 'Pro', 'devices' => 2, 'status' => 'active', 'joined' => '25 Oct 2025'],
                    ];
                @endphp

                @foreach($users as $user)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                    <span class="text-indigo-600 font-medium">{{ substr($user['name'], 0, 1) }}</span>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">{{ $user['name'] }}</p>
                                    <p class="text-sm text-gray-500">{{ $user['email'] }}</p>
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
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $planColors[$user['plan']] }}">
                                {{ $user['plan'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-mobile-screen text-gray-400"></i>
                                <span class="text-gray-700">{{ $user['devices'] }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusColors = [
                                    'active' => 'bg-green-100 text-green-700',
                                    'trial' => 'bg-yellow-100 text-yellow-700',
                                    'inactive' => 'bg-red-100 text-red-700',
                                ];
                            @endphp
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $statusColors[$user['status']] }}">
                                {{ ucfirst($user['status']) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $user['joined'] }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">
                                <button class="p-2 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all" title="View">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-all" title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all" title="Delete">
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
        <p class="text-sm text-gray-500">Showing 1-8 of 1,256 users</p>
        <div class="flex gap-1">
            <button class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-100 rounded-lg transition-all">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button class="px-3 py-1.5 text-sm bg-indigo-600 text-white rounded-lg">1</button>
            <button class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-100 rounded-lg transition-all">2</button>
            <button class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-100 rounded-lg transition-all">3</button>
            <span class="px-3 py-1.5 text-sm text-gray-500">...</span>
            <button class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-100 rounded-lg transition-all">157</button>
            <button class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-100 rounded-lg transition-all">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>
@endsection

