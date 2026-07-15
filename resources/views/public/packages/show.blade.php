@extends('layouts.myrepublic')

@section('content')
<section class="max-w-4xl mx-auto py-12 px-4">
    <div class="bg-white border rounded-2xl p-8 shadow-sm">
        <nav class="text-xs text-gray-500 mb-6 flex space-x-2">
            <a href="{{ route('public.home') }}" class="hover:underline">Home</a>
            <span>/</span>
            <a href="{{ route('public.packages.index') }}" class="hover:underline">Paket</a>
            <span>/</span>
            <span class="text-gray-800 font-medium">{{ $package->name }}</span>
        </nav>

        <h1 class="text-3xl font-extrabold text-gray-900 mb-2">{{ $package->name }}</h1>
        <p class="text-purple-600 font-bold text-lg mb-6">Kecepatan Internet: {{ $package->speed_mbps }} Mbps</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 border-t border-b py-6 mb-6">
            <div>
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-2">Harga Bulanan</h3>
                <p class="text-4xl font-black text-gray-900">Rp {{ number_format($package->price, 0, ',', '.') }}<span class="text-xs text-gray-500 font-normal"> / bulan (belum PPN)</span></p>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-2">Keterangan Paket</h3>
                <p class="text-gray-600 text-sm leading-relaxed">{{ $package->description }}</p>
            </div>
        </div>

        @if($package->features && is_array($package->features))
            <div class="mb-8">
                <h3 class="font-bold text-gray-950 mb-3">Fitur & Kelebihan Paket:</h3>
                <ul class="space-y-2">
                    @foreach($package->features as $feature)
                        <li class="flex items-center space-x-2 text-sm text-gray-700">
                            <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>{{ $feature }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex justify-center space-x-4">
            <a href="{{ route('public.orders.create', ['package_id' => $package->id]) }}" class="bg-purple-600 hover:bg-purple-700 text-white font-bold px-8 py-3 rounded-lg text-base transition shadow-md">
                Daftar Paket Sekarang
            </a>
            <a href="{{ route('public.coverage.check') }}" class="border hover:bg-gray-50 text-gray-700 font-semibold px-8 py-3 rounded-lg text-base transition">
                Cek Area Dahulu
            </a>
        </div>
    </div>
</section>
@endsection
