@extends('layouts.myrepublic')

@section('content')
<section class="max-w-xl mx-auto py-12 px-4">
    <div class="bg-white border rounded-2xl p-6 shadow-sm">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Cek Jangkauan Wilayah WiFi</h1>
        <p class="text-gray-500 text-sm mb-6">Silakan isi formulir di bawah ini untuk memeriksa apakah rumah atau kantor Anda sudah tercover jaringan fiber optic MyRepublic.</p>

        <form action="{{ route('public.coverage.submit') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="w-full border-gray-300 border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp / HP</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required
                    class="w-full border-gray-300 border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500 @error('phone') border-red-500 @enderror">
                @error('phone')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap Pemasangan</label>
                <textarea id="address" name="address" rows="3" required
                    class="w-full border-gray-300 border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500 @error('address') border-red-500 @enderror">{{ old('address') }}</textarea>
                @error('address')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="latitude" class="block text-sm font-medium text-gray-700 mb-1">Latitude (Opsional)</label>
                    <input type="text" id="latitude" name="latitude" value="{{ old('latitude') }}"
                        class="w-full border-gray-300 border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500">
                </div>
                <div>
                    <label for="longitude" class="block text-sm font-medium text-gray-700 mb-1">Longitude (Opsional)</label>
                    <input type="text" id="longitude" name="longitude" value="{{ old('longitude') }}"
                        class="w-full border-gray-300 border rounded-lg px-3 py-2 text-sm focus:ring-purple-500 focus:border-purple-500">
                </div>
            </div>

            <!-- reCAPTCHA -->
            <div class="mt-4">
                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                @error('g-recaptcha-response')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-2.5 rounded-lg text-sm transition shadow-md shadow-purple-200 mt-2">
                Kirim Permintaan Cek Area
            </button>
        </form>
    </div>
</section>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
