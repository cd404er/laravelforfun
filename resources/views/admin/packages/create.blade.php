@extends('layouts.admin')

@section('page_title', 'Tambah Paket WiFi Baru')

@section('content')
<div class="max-w-2xl bg-white rounded-xl border shadow-sm p-6">
    <form action="{{ route('admin.packages.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Paket</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                class="w-full border-gray-300 border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500 @error('name') border-red-500 @enderror">
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="speed_mbps" class="block text-sm font-medium text-gray-700 mb-1">Kecepatan (Mbps)</label>
                <input type="number" id="speed_mbps" name="speed_mbps" value="{{ old('speed_mbps') }}" required min="1"
                    class="w-full border-gray-300 border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500 @error('speed_mbps') border-red-500 @enderror">
                @error('speed_mbps')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga Bulanan (Rp)</label>
                <input type="number" id="price" name="price" value="{{ old('price') }}" required min="0"
                    class="w-full border-gray-300 border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500 @error('price') border-red-500 @enderror">
                @error('price')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Keterangan Paket</label>
            <textarea id="description" name="description" rows="3"
                class="w-full border-gray-300 border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500">{{ old('description') }}</textarea>
        </div>

        <div class="flex items-center">
            <input type="checkbox" id="is_active" name="is_active" value="1" checked
                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
            <label for="is_active" class="ml-2 block text-sm text-gray-900">Aktifkan paket segera</label>
        </div>

        <div class="flex justify-end space-x-3 pt-2">
            <a href="{{ route('admin.packages.index') }}" class="px-4 py-2 border rounded-lg text-sm font-semibold text-gray-700 hover:bg-gray-50 transition">
                Batal
            </a>
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                Simpan Paket
            </button>
        </div>
    </form>
</div>
@endsection
