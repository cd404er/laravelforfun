@extends('layouts.myrepublic')

@section('content')
<!-- Hero Section -->
<section id="homepage" class="bg-gradient-to-tr from-purple-700 to-indigo-800 text-white py-16 px-4">
    <div class="max-w-7xl mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-black mb-4 tracking-tight leading-tight">Internet Ultra Cepat Tanpa Batas Kuota</h1>
        <p class="text-lg md:text-xl text-purple-100 max-w-2xl mx-auto mb-8">Nikmati koneksi fiber optic handal dari MyRepublic untuk kebutuhan kerja, belajar, gaming, dan hiburan keluarga Anda.</p>
        <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4">
            <a href="{{ route('public.packages.index') }}" class="bg-white text-purple-700 hover:bg-purple-50 px-6 py-3 rounded-lg font-bold text-base transition shadow-md">Lihat Paket Internet</a>
            <a href="{{ route('public.coverage.check') }}" class="bg-transparent border border-white hover:bg-white hover:text-purple-700 px-6 py-3 rounded-lg font-bold text-base transition">Cek Wilayah Anda</a>
        </div>
    </div>
</section>

<!-- Packages Section -->
<section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-extrabold text-gray-900">Pilih Paket Internet Sesuai Kebutuhan Anda</h2>
        <p class="text-gray-500 mt-2">Dapatkan kecepatan internet fiber terbaik dengan harga terjangkau.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($packages as $package)
        <div class="bg-white border rounded-2xl shadow-sm hover:shadow-lg transition p-6 flex flex-col justify-between relative overflow-hidden">
            @if($package->speed_mbps >= 150)
            <div class="absolute top-0 right-0 bg-red-500 text-white text-[10px] font-bold uppercase tracking-wider py-1 px-3 rounded-bl-lg">
                Populer
            </div>
            @endif
            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $package->name }}</h3>
                <p class="text-gray-500 text-sm mb-4">Up to <span class="font-bold text-purple-600">{{ $package->speed_mbps }} Mbps</span></p>
                <div class="flex items-baseline mb-6">
                    <span class="text-3xl font-black text-gray-900">Rp {{ number_format($package->price, 0, ',', '.') }}</span>
                    <span class="text-gray-500 text-xs ml-1">/bulan</span>
                </div>
                <p class="text-gray-600 text-sm mb-6">{{ $package->description }}</p>
            </div>
            <div class="space-y-3 mt-auto">
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
            <p class="text-gray-500">Belum ada paket internet yang aktif saat ini.</p>
        </div>
        @endforelse
    </div>
</section>

<!-- About / Tentang Kami Section -->
<section id="tentang" class="bg-gray-50 py-12 sm:py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-10 sm:mb-12">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Tentang MyRepublic WiFi</h2>
            <p class="text-gray-500 mt-3 max-w-2xl mx-auto text-sm sm:text-base">
                Agen resmi penjualan layanan internet fiber optik MyRepublic — fokus pada koneksi stabil, unlimited quota (tanpa FUP), dan dukungan pelanggan.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-10 items-center">
            <div class="rounded-2xl overflow-hidden border border-gray-100 bg-white shadow-sm">
                <picture>
                    <source media="(min-width: 1024px)" srcset="/images/about-2.webp">
                    <source media="(max-width: 639px)" srcset="/images/about-1.webp">
                    <source media="(min-width: 640px)" srcset="/images/about-1.webp">
                    <img
                        src="/images/about-1.webp"
                        alt="Tentang MyRepublic"
                        class="w-full h-56 sm:h-64 lg:h-80 object-cover bg-white"
                        loading="lazy"
                    />
                </picture>
            </div>

            <div class="space-y-5 sm:space-y-6">
                <div class="space-y-2">
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900">Kenapa memilih MyRepublic?</h3>
                    <p class="text-gray-700 text-sm sm:text-base leading-relaxed">
                        Kami membantu Anda memilih paket internet terbaik untuk rumah dan bisnis.
                        Dengan jaringan fiber optik dan layanan yang responsif, kebutuhan internet Anda tetap lancar setiap hari.
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-3 sm:gap-4">
                    <div class="rounded-xl border border-purple-100 bg-purple-50 p-3 sm:p-4">
                        <div class="text-purple-700 font-semibold text-sm">Jaringan Fiber</div>
                        <div class="text-gray-700 text-xs mt-1">100% Stabil & Cepat</div>
                    </div>
                    <div class="rounded-xl border border-purple-100 bg-purple-50 p-3 sm:p-4">
                        <div class="text-purple-700 font-semibold text-sm">No FUP</div>
                        <div class="text-gray-700 text-xs mt-1">Unlimited Quota</div>
                    </div>
                    <div class="rounded-xl border border-purple-100 bg-purple-50 p-3 sm:p-4">
                        <div class="text-purple-700 font-semibold text-sm">Support 24/7</div>
                        <div class="text-gray-700 text-xs mt-1">Siap bantu setiap saat</div>
                    </div>
                    <div class="rounded-xl border border-purple-100 bg-purple-50 p-3 sm:p-4">
                        <div class="text-purple-700 font-semibold text-sm">Instalasi</div>
                        <div class="text-gray-700 text-xs mt-1">Cepat & Koordinatif</div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                    <a
                        href="{{ route('public.orders.create') }}"
                        class="inline-flex items-center justify-center bg-purple-600 hover:bg-purple-700 text-white font-bold text-sm px-5 sm:px-6 py-3 rounded-lg transition shadow">
                        Daftar Sekarang
                    </a>
                    <a
                        href="{{ route('public.coverage.check') }}"
                        class="inline-flex items-center justify-center bg-white hover:bg-purple-50 border border-purple-200 text-purple-700 font-semibold text-sm px-5 sm:px-6 py-3 rounded-lg transition">
                        Cek Jangkauan Area
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection