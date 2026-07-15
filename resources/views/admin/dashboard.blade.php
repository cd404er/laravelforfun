@extends('layouts.admin')

@section('page_title', 'Dashboard Ringkasan')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Stat 1 -->
    <div class="bg-white p-6 rounded-xl border shadow-sm flex items-center space-x-4">
        <div class="p-3 rounded-lg bg-blue-100 text-blue-600">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-500 font-medium uppercase tracking-wider">Total Paket WiFi</p>
            <h3 class="text-2xl font-bold text-gray-950">{{ $totalPackages }}</h3>
        </div>
    </div>

    <!-- Stat 2 -->
    <div class="bg-white p-6 rounded-xl border shadow-sm flex items-center space-x-4">
        <div class="p-3 rounded-lg bg-yellow-100 text-yellow-600">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-500 font-medium uppercase tracking-wider">Orderan Pending</p>
            <h3 class="text-2xl font-bold text-gray-950">{{ $totalPendingOrders }}</h3>
        </div>
    </div>

    <!-- Stat 3 -->
    <div class="bg-white p-6 rounded-xl border shadow-sm flex items-center space-x-4">
        <div class="p-3 rounded-lg bg-purple-100 text-purple-600">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>
        <div>
            <p class="text-xs text-gray-500 font-medium uppercase tracking-wider">Cek Area Pending</p>
            <h3 class="text-2xl font-bold text-gray-950">{{ $totalPendingCoverage }}</h3>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Orders -->
    <div class="bg-white rounded-xl border shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-gray-900">Registrasi Langganan Terbaru</h3>
            <a href="{{ route('admin.orders.index') }}" class="text-xs text-purple-600 font-semibold hover:underline">Lihat Semua</a>
        </div>
        <div class="space-y-4">
            @forelse($recentOrders as $order)
                <div class="flex justify-between items-center border-b pb-3 last:border-0 last:pb-0">
                    <div>
                        <p class="font-semibold text-sm text-gray-900">{{ $order->customer_name }}</p>
                        <p class="text-xs text-gray-500">{{ $order->package->name }} - {{ $order->customer_phone }}</p>
                    </div>
                    <span class="text-xs px-2.5 py-0.5 rounded-full font-bold
                        {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                        {{ $order->status === 'survey_scheduled' ? 'bg-blue-100 text-blue-800' : '' }}
                        {{ $order->status === 'installed' ? 'bg-green-100 text-green-800' : '' }}
                        {{ $order->status === 'cancelled' ? 'bg-gray-100 text-gray-800' : '' }}
                    ">
                        {{ $order->status }}
                    </span>
                </div>
            @empty
                <p class="text-gray-500 text-sm py-4">Belum ada registrasi baru.</p>
            @endforelse
        </div>
    </div>

    <!-- Recent Coverage Checks -->
    <div class="bg-white rounded-xl border shadow-sm p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-gray-900">Permintaan Cek Area Terbaru</h3>
            <a href="{{ route('admin.coverage-checks.index') }}" class="text-xs text-purple-600 font-semibold hover:underline">Lihat Semua</a>
        </div>
        <div class="space-y-4">
            @forelse($recentCoverageChecks as $check)
                <div class="flex justify-between items-center border-b pb-3 last:border-0 last:pb-0">
                    <div>
                        <p class="font-semibold text-sm text-gray-900">{{ $check->name }}</p>
                        <p class="text-xs text-gray-500">{{ Str::limit($check->address, 50) }}</p>
                    </div>
                    <span class="text-xs px-2.5 py-0.5 rounded-full font-bold
                        {{ $check->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}
                    ">
                        {{ $check->status }}
                    </span>
                </div>
            @empty
                <p class="text-gray-500 text-sm py-4">Belum ada permintaan cek area.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
