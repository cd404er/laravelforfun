@extends('layouts.myrepublic')

@section('content')
<section class="max-w-md mx-auto py-16 px-4 text-center">
    <div class="bg-white border rounded-2xl p-8 shadow-sm flex flex-col items-center">
        <div class="h-16 w-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
            <svg class="h-10 w-10 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Pendaftaran Berhasil!</h1>
        <p class="text-gray-500 text-sm mb-6">Terima kasih telah melakukan pendaftaran langganan WiFi MyRepublic. Formulir Anda telah kami terima.</p>
        
        <div class="bg-purple-50 text-purple-900 text-xs font-semibold px-4 py-3 rounded-lg mb-6 w-full text-left">
            <p class="font-bold mb-1 text-purple-950">Apa langkah selanjutnya?</p>
            <ol class="list-decimal list-inside space-y-1 text-purple-800 font-normal">
                <li>Sales agent kami akan memverifikasi alamat Anda.</li>
                <li>Kami akan menghubungi Anda lewat WhatsApp/Telepon.</li>
                <li>Penjadwalan survei lokasi dan instalasi perangkat WiFi.</li>
            </ol>
        </div>

        <a href="{{ route('public.home') }}" class="bg-purple-600 hover:bg-purple-700 text-white font-bold px-6 py-2.5 rounded-lg text-sm transition w-full shadow-md shadow-purple-200">
            Kembali ke Beranda
        </a>
    </div>
</section>
@endsection
