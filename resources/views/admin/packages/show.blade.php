@extends('layouts.admin')

@section('page_title', 'Detail Paket WiFi')

@section('content')
<div class="max-w-2xl bg-white rounded-xl border shadow-sm p-6">
    <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h3 class="text-xl font-bold text-gray-900">{{ $package->name }}</h3>
        <span class="px-2.5 py-0.5 text-xs font-bold rounded-full {{ $package->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
            {{ $package->is_active ? 'Aktif' : 'Non-aktif' }}
        </span>
    </div>

    <div class="space-y-4">
        <div>
            <span class="text-xs font-semibold text-gray-500 uppercase">Slug URL</span>
            <p class="text-sm font-medium text-gray-800">{{ $package->slug }}</p>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <span class="text-xs font-semibold text-gray-500 uppercase">Kecepatan Internet</span>
                <p class="text-sm font-semibold text-purple-600">{{ $package->speed_mbps }} Mbps</p>
            </div>
            <div>
                <span class="text-xs font-semibold text-gray-500 uppercase">Harga Bulanan</span>
                <p class="text-sm font-bold text-gray-900">Rp {{ number_format($package->price, 0, ',', '.') }}</p>
            </div>
        </div>

        <div>
            <span class="text-xs font-semibold text-gray-500 uppercase">Keterangan Paket</span>
            <p class="text-sm text-gray-700 leading-relaxed">{{ $package->description ?? 'Tidak ada keterangan.' }}</p>
        </div>
    </div>

    <div class="flex justify-end space-x-3 pt-6 border-t mt-6">
        <a href="{{ route('admin.packages.index') }}" class="px-4 py-2 border rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 transition">
            Kembali
        </a>
        <a href="{{ route('admin.packages.edit', $package) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
            Ubah Paket
        </a>
    </div>
</div>
@endsection
