@extends('layouts.admin')

@section('page_title', 'Kelola Permintaan Cek Coverage Area')

@section('content')
<div class="bg-white rounded-xl border shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="font-bold text-gray-900">Daftar Pengajuan Cek Area</h3>
        
        <div class="flex gap-2 text-sm">
            <a href="{{ route('admin.coverage-checks.index') }}" class="px-3 py-1.5 rounded-lg {{ !$status ? 'bg-purple-600 text-white font-semibold' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                Semua
            </a>
            <a href="{{ route('admin.coverage-checks.index', ['status' => 'pending']) }}" class="px-3 py-1.5 rounded-lg {{ $status === 'pending' ? 'bg-purple-600 text-white font-semibold' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                Pending
            </a>
            <a href="{{ route('admin.coverage-checks.index', ['status' => 'processed']) }}" class="px-3 py-1.5 rounded-lg {{ $status === 'processed' ? 'bg-purple-600 text-white font-semibold' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                Selesai Dicek
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-500 border-collapse">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 font-semibold">Nama Pemohon</th>
                    <th class="px-6 py-3 font-semibold">No. HP / WhatsApp</th>
                    <th class="px-6 py-3 font-semibold">Alamat Lokasi</th>
                    <th class="px-6 py-3 font-semibold">Koordinat</th>
                    <th class="px-6 py-3 font-semibold">Cakupan WiFi</th>
                    <th class="px-6 py-3 font-semibold">Progres</th>
                    <th class="px-6 py-3 font-semibold">Aksi / Update</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($checks as $check)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-semibold text-gray-900">{{ $check->name }}</td>
                        <td class="px-6 py-4">{{ $check->phone }}</td>
                        <td class="px-6 py-4 max-w-xs truncate" title="{{ $check->address }}">{{ $check->address }}</td>
                        <td class="px-6 py-4 text-xs font-mono">
                            @if($check->latitude && $check->longitude)
                                {{ $check->latitude }}, {{ $check->longitude }}
                            @else
                                <span class="text-gray-400 italic">No GPS</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if(is_null($check->is_covered))
                                <span class="px-2 py-0.5 text-xs font-bold rounded-full bg-yellow-100 text-yellow-800">Menunggu Survei</span>
                            @elseif($check->is_covered)
                                <span class="px-2 py-0.5 text-xs font-bold rounded-full bg-green-100 text-green-800">Tercover Jaringan</span>
                            @else
                                <span class="px-2 py-0.5 text-xs font-bold rounded-full bg-red-100 text-red-800">Belum Tercover</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-0.5 text-xs font-semibold rounded {{ $check->status === 'pending' ? 'bg-orange-50 text-orange-700 border border-orange-200' : 'bg-green-50 text-green-700 border border-green-200' }}">
                                {{ $check->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.coverage-checks.updateStatus', $check) }}" method="POST" class="flex items-center space-x-2">
                                @csrf
                                @method('PATCH')
                                <select name="is_covered" required class="text-xs border rounded p-1">
                                    <option value="" disabled selected>-- Hasil --</option>
                                    <option value="1" {{ $check->is_covered === true ? 'selected' : '' }}>Tercover</option>
                                    <option value="0" {{ $check->is_covered === false ? 'selected' : '' }}>Tidak Tercover</option>
                                </select>
                                <input type="hidden" name="status" value="processed">
                                <button type="submit" class="bg-purple-600 text-white px-2 py-1 rounded text-xs hover:bg-purple-700 transition">
                                    Simpan
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">Tidak ada pengajuan cek area.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $checks->links() }}
    </div>
</div>
@endsection
