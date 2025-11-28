@extends('layouts.admin')

@section('title', 'API Logs')
@section('page-title', 'API Logs')
@section('page-description', 'Monitor API requests and responses')

@section('content')
<!-- Stats -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-code text-indigo-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">1.2M</p>
                <p class="text-xs text-gray-500">Total Requests</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-check text-green-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">98.5%</p>
                <p class="text-xs text-gray-500">Success Rate</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-bolt text-cyan-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">45ms</p>
                <p class="text-xs text-gray-500">Avg Response</p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-xl p-4 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-triangle-exclamation text-red-600"></i>
            </div>
            <div>
                <p class="text-xl font-bold text-gray-900">1.5%</p>
                <p class="text-xs text-gray-500">Error Rate</p>
            </div>
        </div>
    </div>
</div>

<!-- API Logs Table -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="p-4 border-b border-gray-100 flex flex-col sm:flex-row justify-between gap-4">
        <div class="flex gap-2">
            <select class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white">
                <option>All Methods</option>
                <option>GET</option>
                <option>POST</option>
                <option>PUT</option>
                <option>DELETE</option>
            </select>
            <select class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white">
                <option>All Status</option>
                <option>2xx Success</option>
                <option>4xx Client Error</option>
                <option>5xx Server Error</option>
            </select>
        </div>
        <div class="relative">
            <i class="fa-solid fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" placeholder="Search endpoint..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Method</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Endpoint</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">User</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Response</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Time</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @php
                    $logs = [
                        ['method' => 'POST', 'endpoint' => '/api/v1/send-message', 'user' => 'Toko Berkah', 'status' => 200, 'response' => '45ms', 'time' => '10:30:15'],
                        ['method' => 'GET', 'endpoint' => '/api/v1/contacts', 'user' => 'CV Maju', 'status' => 200, 'response' => '32ms', 'time' => '10:30:12'],
                        ['method' => 'POST', 'endpoint' => '/api/v1/broadcast', 'user' => 'UD Sentosa', 'status' => 201, 'response' => '156ms', 'time' => '10:30:08'],
                        ['method' => 'GET', 'endpoint' => '/api/v1/devices', 'user' => 'PT Abadi', 'status' => 200, 'response' => '28ms', 'time' => '10:30:05'],
                        ['method' => 'POST', 'endpoint' => '/api/v1/send-message', 'user' => 'Warung Barokah', 'status' => 401, 'response' => '12ms', 'time' => '10:30:02'],
                        ['method' => 'DELETE', 'endpoint' => '/api/v1/contacts/123', 'user' => 'Apotek Sehat', 'status' => 500, 'response' => '234ms', 'time' => '10:29:58'],
                    ];
                @endphp

                @foreach($logs as $log)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            @php
                                $methodColors = [
                                    'GET' => 'bg-blue-100 text-blue-700',
                                    'POST' => 'bg-green-100 text-green-700',
                                    'PUT' => 'bg-yellow-100 text-yellow-700',
                                    'DELETE' => 'bg-red-100 text-red-700',
                                ];
                            @endphp
                            <span class="px-2 py-1 text-xs font-medium rounded {{ $methodColors[$log['method']] }}">
                                {{ $log['method'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <code class="text-sm text-gray-700 font-mono">{{ $log['endpoint'] }}</code>
                        </td>
                        <td class="px-6 py-4 text-gray-700">{{ $log['user'] }}</td>
                        <td class="px-6 py-4">
                            @php
                                $statusColor = $log['status'] >= 500 ? 'text-red-600' : ($log['status'] >= 400 ? 'text-yellow-600' : 'text-green-600');
                            @endphp
                            <span class="font-mono font-medium {{ $statusColor }}">{{ $log['status'] }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $log['response'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 font-mono">{{ $log['time'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
        <p class="text-sm text-gray-500">Showing 1-6 of 1,234,567 requests</p>
        <div class="flex gap-1">
            <button class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-100 rounded-lg">Previous</button>
            <button class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-100 rounded-lg">Next</button>
        </div>
    </div>
</div>
@endsection

