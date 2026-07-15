@extends('layouts.admin')

@section('page_title', 'Kelola Pesanan & Registrasi WiFi')

@section('content')
<div class="bg-white rounded-xl border shadow-sm p-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
        <h3 class="font-bold text-gray-900">Daftar Registrasi Pemasangan</h3>
        
        <!-- Status Filter Tabs -->
        <div class="flex flex-wrap gap-2 text-sm">
            <a href="{{ route('admin.orders.index') }}" class="px-3 py-1.5 rounded-lg {{ !$status ? 'bg-purple-600 text-white font-semibold' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                Semua
            </a>
            <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" class="px-3 py-1.5 rounded-lg {{ $status === 'pending' ? 'bg-purple-600 text-white font-semibold' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                Pending
            </a>
            <a href="{{ route('admin.orders.index', ['status' => 'survey_scheduled']) }}" class="px-3 py-1.5 rounded-lg {{ $status === 'survey_scheduled' ? 'bg-purple-600 text-white font-semibold' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                Survei Terjadwal
            </a>
            <a href="{{ route('admin.orders.index', ['status' => 'installed']) }}" class="px-3 py-1.5 rounded-lg {{ $status === 'installed' ? 'bg-purple-600 text-white font-semibold' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                Terpasang
            </a>
            <a href="{{ route('admin.orders.index', ['status' => 'cancelled']) }}" class="px-3 py-1.5 rounded-lg {{ $status === 'cancelled' ? 'bg-purple-600 text-white font-semibold' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                Dibatalkan
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-500 border-collapse">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 font-semibold">Pelanggan</th>
                    <th class="px-6 py-3 font-semibold">Kontak</th>
                    <th class="px-6 py-3 font-semibold">Paket Pilihan</th>
                    <th class="px-6 py-3 font-semibold">Status</th>
                    <th class="px-6 py-3 font-semibold">Tanggal Daftar</th>
                    <th class="px-6 py-3 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($orders as $order)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-semibold text-gray-950">{{ $order->customer_name }}</td>
                        <td class="px-6 py-4">
                            <p class="text-xs text-gray-900">{{ $order->customer_phone }}</p>
                            <p class="text-xs text-gray-500">{{ $order->customer_email }}</p>
                        </td>
                        <td class="px-6 py-4">{{ $order->package->name }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-0.5 text-xs font-bold rounded-full
                                {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $order->status === 'survey_scheduled' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $order->status === 'installed' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $order->status === 'cancelled' ? 'bg-gray-100 text-gray-800' : '' }}
                            ">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-purple-600 hover:text-purple-900 font-semibold text-xs">
                                Proses / Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">Tidak ada data registrasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>
@endsection
