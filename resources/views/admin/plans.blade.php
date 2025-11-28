@extends('layouts.admin')

@section('title', 'Plans & Pricing')
@section('page-title', 'Plans & Pricing')
@section('page-description', 'Manage subscription plans and pricing')

@section('content')
<!-- Current Plans -->
<div class="grid md:grid-cols-3 gap-6 mb-8">
    @php
        $plans = [
            [
                'name' => 'Starter',
                'price' => 0,
                'period' => 'Free',
                'subscribers' => 234,
                'features' => ['1 Device', '100 Messages/day', 'Basic Auto-Reply', '500 Contacts'],
                'color' => 'gray',
            ],
            [
                'name' => 'Pro',
                'price' => 199000,
                'period' => '/month',
                'subscribers' => 512,
                'features' => ['3 Devices', 'Unlimited Messages', 'Advanced Chatbot', '10,000 Contacts', 'Broadcast'],
                'color' => 'indigo',
                'popular' => true,
            ],
            [
                'name' => 'Enterprise',
                'price' => 499000,
                'period' => '/month',
                'subscribers' => 146,
                'features' => ['Unlimited Devices', 'Unlimited Messages', 'AI Chatbot', 'Unlimited Contacts', 'Full API Access', 'Priority Support'],
                'color' => 'purple',
            ],
        ];
    @endphp

    @foreach($plans as $plan)
        <div class="bg-white rounded-xl shadow-sm overflow-hidden relative {{ isset($plan['popular']) ? 'ring-2 ring-indigo-500' : '' }}">
            @if(isset($plan['popular']))
                <div class="absolute top-0 right-0 bg-indigo-500 text-white text-xs font-medium px-3 py-1 rounded-bl-lg">
                    Most Popular
                </div>
            @endif
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $plan['name'] }}</h3>
                <div class="flex items-baseline gap-1 mb-4">
                    @if($plan['price'] > 0)
                        <span class="text-3xl font-bold text-gray-900">Rp {{ number_format($plan['price']) }}</span>
                        <span class="text-gray-500">{{ $plan['period'] }}</span>
                    @else
                        <span class="text-3xl font-bold text-gray-900">{{ $plan['period'] }}</span>
                    @endif
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-500 mb-6">
                    <i class="fa-solid fa-users"></i>
                    <span>{{ $plan['subscribers'] }} subscribers</span>
                </div>
                <ul class="space-y-3 mb-6">
                    @foreach($plan['features'] as $feature)
                        <li class="flex items-center gap-2 text-sm text-gray-600">
                            <i class="fa-solid fa-check text-green-500"></i>
                            <span>{{ $feature }}</span>
                        </li>
                    @endforeach
                </ul>
                <button class="w-full py-2.5 border border-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-pen"></i>
                    <span>Edit Plan</span>
                </button>
            </div>
        </div>
    @endforeach
</div>

<!-- Add New Plan -->
<div class="bg-white rounded-xl shadow-sm p-6 mb-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-bold text-gray-900">Create New Plan</h2>
    </div>
    <form class="grid md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Plan Name</label>
            <input type="text" placeholder="e.g. Business" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Price (IDR)</label>
            <input type="number" placeholder="299000" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Max Devices</label>
            <input type="number" placeholder="5" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Max Contacts</label>
            <input type="number" placeholder="25000" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Features (one per line)</label>
            <textarea rows="4" placeholder="Feature 1&#10;Feature 2&#10;Feature 3" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none"></textarea>
        </div>
        <div class="md:col-span-2 flex justify-end">
            <button type="submit" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-all flex items-center gap-2">
                <i class="fa-solid fa-plus"></i>
                <span>Create Plan</span>
            </button>
        </div>
    </form>
</div>

<!-- Promo Codes -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
        <h2 class="text-lg font-bold text-gray-900">Promo Codes</h2>
        <button class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-all flex items-center gap-2">
            <i class="fa-solid fa-plus"></i>
            <span>Add Code</span>
        </button>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Code</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Discount</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Usage</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Expires</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @php
                    $promoCodes = [
                        ['code' => 'NEWYEAR25', 'discount' => '25%', 'used' => 45, 'limit' => 100, 'expires' => '31 Dec 2025', 'status' => 'active'],
                        ['code' => 'WELCOME50', 'discount' => '50%', 'used' => 234, 'limit' => 500, 'expires' => '31 Jan 2026', 'status' => 'active'],
                        ['code' => 'FLASH20', 'discount' => '20%', 'used' => 100, 'limit' => 100, 'expires' => '15 Nov 2025', 'status' => 'expired'],
                    ];
                @endphp
                @foreach($promoCodes as $promo)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <code class="px-2 py-1 bg-gray-100 rounded text-sm font-mono">{{ $promo['code'] }}</code>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $promo['discount'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $promo['used'] }} / {{ $promo['limit'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $promo['expires'] }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $promo['status'] === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                {{ ucfirst($promo['status']) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-all">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

