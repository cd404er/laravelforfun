@extends('layouts.myrepublic')

@section('content')
<section class="max-w-xl mx-auto py-12 px-4">
    <div class="bg-white border rounded-2xl p-6 shadow-sm">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Formulir Pendaftaran WiFi MyRepublic</h1>
        <p class="text-gray-500 text-sm mb-6">Lengkapi data diri Anda untuk pengajuan berlangganan paket internet fiber optik.</p>

        <form action="{{ route('public.orders.submit') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="package_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Paket WiFi</label>
                <select id="package_id" name="package_id" required
                    class="w-full border-gray-300 border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500 @error('package_id') border-red-500 @enderror">
                    <option value="" disabled selected>-- Pilih Paket --</option>
                    @foreach($packages as $package)
                        <option value="{{ $package->id }}" {{ (old('package_id', $selectedPackageId) == $package->id) ? 'selected' : '' }}>
                            {{ $package->name }} - {{ $package->speed_mbps }} Mbps (Rp {{ number_format($package->price, 0, ',', '.') }}/bln)
                        </option>
                    @endforeach
                </select>
                @error('package_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap Sesuai KTP</label>
                <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required
                    class="w-full border-gray-300 border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500 @error('customer_name') border-red-500 @enderror">
                @error('customer_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="customer_phone" class="block text-sm font-medium text-gray-700 mb-1">No. WhatsApp / HP</label>
                    <input type="text" id="customer_phone" name="customer_phone" value="{{ old('customer_phone') }}" required
                        class="w-full border-gray-300 border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500 @error('customer_phone') border-red-500 @enderror">
                    @error('customer_phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="customer_email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                    <input type="email" id="customer_email" name="customer_email" value="{{ old('customer_email') }}" required
                        class="w-full border-gray-300 border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500 @error('customer_email') border-red-500 @enderror">
                    @error('customer_email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat Pemasangan Lengkap</label>
                <textarea id="address" name="address" rows="3" required placeholder="Jalan, Blok, Nomor Rumah, RT/RW, Kelurahan, Kecamatan, Kota"
                    class="w-full border-gray-300 border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500 @error('address') border-red-500 @enderror">{{ old('address') }}</textarea>
                @error('address')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Catatan Tambahan (Opsional)</label>
                <textarea id="notes" name="notes" rows="2" placeholder="Catatan khusus lokasi, dsb."
                    class="w-full border-gray-300 border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500">{{ old('notes') }}</textarea>
            </div>

            <!-- reCAPTCHA -->
            <div class="mt-4">
                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                @error('g-recaptcha-response')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-2.5 rounded-lg text-sm transition shadow-md shadow-purple-200 mt-2">
                Kirim Pengajuan Langganan
            </button>
        </form>
    </div>
</section>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
