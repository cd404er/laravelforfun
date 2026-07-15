@extends('layouts.admin')

@section('page_title', 'Kelola Paket WiFi')

@section('content')
<div class="bg-white rounded-xl border shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="font-bold text-gray-900">Daftar Paket Internet</h3>
        <a href="{{ route('admin.packages.create') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
            + Tambah Paket
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-500 border-collapse">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 font-semibold">Nama Paket</th>
                    <th class="px-6 py-3 font-semibold">Kecepatan</th>
                    <th class="px-6 py-3 font-semibold">Harga</th>
                    <th class="px-6 py-3 font-semibold">Status</th>
                    <th class="px-6 py-3 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($packages as $package)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-semibold text-gray-900">{{ $package->name }}</td>
                        <td class="px-6 py-4">{{ $package->speed_mbps }} Mbps</td>
                        <td class="px-6 py-4">Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-0.5 text-xs font-bold rounded-full {{ $package->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $package->is_active ? 'Aktif' : 'Non-aktif' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 flex space-x-3">
                            <a href="{{ route('admin.packages.show', $package) }}" class="text-blue-600 hover:text-blue-900 font-semibold">Detail</a>
                            <a href="{{ route('admin.packages.edit', $package) }}" class="text-yellow-600 hover:text-yellow-900 font-semibold">Ubah</a>
                            <form action="{{ route('admin.packages.destroy', $package) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-950 font-semibold">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada paket internet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $packages->links() }}
    </div>
</div>
@endsection
