@extends('layouts.admin')

@section('page_title', 'Detail & Proses Pemasangan')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Order Details -->
    <div class="lg:col-span-2 bg-white rounded-xl border shadow-sm p-6 space-y-6">
        <div class="flex justify-between items-center border-b pb-4">
            <h3 class="font-bold text-gray-900 text-lg">Data Pendaftaran #{{ $order->id }}</h3>
            <span class="px-2.5 py-0.5 text-xs font-bold rounded-full
                {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                {{ $order->status === 'survey_scheduled' ? 'bg-blue-100 text-blue-800' : '' }}
                {{ $order->status === 'installed' ? 'bg-green-100 text-green-800' : '' }}
                {{ $order->status === 'cancelled' ? 'bg-gray-100 text-gray-800' : '' }}
            ">
                {{ $order->status }}
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <span class="text-xs font-semibold text-gray-500 uppercase">Nama Pelanggan</span>
                <p class="text-sm font-semibold text-gray-950 mt-0.5">{{ $order->customer_name }}</p>
            </div>
            <div>
                <span class="text-xs font-semibold text-gray-500 uppercase">Paket WiFi Pilihan</span>
                <p class="text-sm font-semibold text-purple-700 mt-0.5">{{ $order->package->name }} ({{ $order->package->speed_mbps }} Mbps)</p>
            </div>
            <div>
                <span class="text-xs font-semibold text-gray-500 uppercase">Nomor HP / WhatsApp</span>
                <p class="text-sm font-medium text-gray-900 mt-0.5">{{ $order->customer_phone }}</p>
            </div>
            <div>
                <span class="text-xs font-semibold text-gray-500 uppercase">Alamat Email</span>
                <p class="text-sm font-medium text-gray-900 mt-0.5">{{ $order->customer_email }}</p>
            </div>
        </div>

        <div>
            <span class="text-xs font-semibold text-gray-500 uppercase">Alamat Lengkap Pemasangan</span>
            <p class="text-sm text-gray-800 leading-relaxed mt-1 bg-gray-50 p-3 rounded-lg border">{{ $order->address }}</p>
        </div>

        <div>
            <span class="text-xs font-semibold text-gray-500 uppercase">Catatan Tambahan Pelanggan</span>
            <p class="text-sm text-gray-700 leading-relaxed mt-1 italic">{{ $order->notes ?? 'Tidak ada catatan tambahan.' }}</p>
        </div>
    </div>

    <!-- Status Process Card -->
    <div class="bg-white rounded-xl border shadow-sm p-6">
        <h3 class="font-bold text-gray-900 border-b pb-4 mb-4">Proses Pemasangan</h3>
        
        <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status Progres</label>
                <select id="status" name="status" required
                    class="w-full border-gray-300 border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500">
                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending (Verifikasi Awal)</option>
                    <option value="survey_scheduled" {{ $order->status === 'survey_scheduled' ? 'selected' : '' }}>Survei Lokasi Terjadwal</option>
                    <option value="installed" {{ $order->status === 'installed' ? 'selected' : '' }}>Terpasang (Aktif)</option>
                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Dibatalkan / Gagal Pasang</option>
                </select>
            </div>

            <div>
                <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Catatan Tim Sales / Internal</label>
                <textarea id="notes" name="notes" rows="4" placeholder="Update progress survei, kendala jaringan, atau tanggal pasang..."
                    class="w-full border-gray-300 border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500">{{ old('notes', $order->notes) }}</textarea>
            </div>

            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded-lg text-sm transition shadow-md shadow-purple-200">
                Update Status
            </button>
        </form>

        <div class="mt-6 pt-6 border-t">
            <a href="{{ route('admin.orders.index') }}" class="block text-center text-xs font-semibold text-gray-500 hover:underline">
                &larr; Kembali ke daftar pesanan
            </a>
        </div>
    </div>
</div>
@endsection
