@extends('layouts.myrepublic')

@section('content')
<section class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Daftar Paket Internet Fiber MyRepublic</h1>
        <p class="text-gray-500 mt-2">Dapatkan layanan internet terbaik untuk kebutuhan rumah tangga maupun bisnis kecil Anda.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($packages as $package)
            <div class="bg-white border rounded-2xl shadow-sm hover:shadow-lg transition p-6 flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $package->name }}</h3>
                    <p class="text-gray-500 text-sm mb-4">Kecepatan: <span class="font-bold text-purple-600">{{ $package->speed_mbps }} Mbps</span></p>
                    <div class="flex items-baseline mb-6">
                        <span class="text-3xl font-black text-gray-900">Rp {{ number_format($package->price, 0, ',', '.') }}</span>
                        <span class="text-gray-500 text-xs ml-1">/bulan</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-6">{{ $package->description }}</p>
                </div>
                <div class="mt-auto space-y-3">
                    <a href="{{ route('public.orders.create', ['package_id' => $package->id]) }}" class="block text-center bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded-lg text-sm transition">
                        Daftar Paket
                    </a>
                    <a href="{{ route('public.packages.show', $package->slug) }}" class="block text-center text-purple-600 hover:text-purple-700 text-sm font-semibold">
                        Detail Selengkapnya
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-12">
                <p class="text-gray-500">Belum ada paket internet yang tersedia.</p>
            </div>
        @endforelse
    </div>
</section>
@endsection
