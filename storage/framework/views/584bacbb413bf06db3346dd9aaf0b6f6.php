<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyRepublic WiFi Sales - Internet Fiber Tercepat & Stabil</title>
    <meta name="description" content="Daftarkan layanan internet fiber MyRepublic untuk rumah dan bisnis Anda. Nikmati koneksi super cepat, unlimited quota, tanpa batas.">
    <!-- Tailwind CSS (via CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .wa-float {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 9999;
            animation: pulse-wa 2s infinite;
        }
        @keyframes pulse-wa {
            0%, 100% { box-shadow: 0 0 0 0 rgba(37,211,102,0.5); }
            50% { box-shadow: 0 0 0 12px rgba(37,211,102,0); }
        }
        .footer-link { transition: color 0.2s, padding-left 0.2s; }
        .footer-link:hover { color: #c084fc; padding-left: 4px; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col justify-between">

    <!-- Top Bar -->
    <div class="bg-purple-700 text-white text-xs py-2 px-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <span class="hidden md:block">🎉 Nikmati Internet Fiber Cepat dengan Promo Diskon Besar & Instalasi Gratis!</span>
            <div class="flex items-center space-x-4 ml-auto">
                <a href="https://www.facebook.com/" target="_blank" class="hover:text-purple-200 transition">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="https://www.tiktok.com/" target="_blank" class="hover:text-purple-200 transition">
                    <i class="fa-brands fa-tiktok"></i>
                </a>
                <a href="https://www.youtube.com/" target="_blank" class="hover:text-purple-200 transition">
                    <i class="fa-brands fa-youtube"></i>
                </a>
                <a href="https://www.instagram.com/" target="_blank" class="hover:text-purple-200 transition">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="bg-white shadow-sm border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <span class="text-2xl font-black text-purple-700 tracking-wider">MyRepublic</span>
                <span class="bg-purple-100 text-purple-800 text-xs px-2 py-0.5 rounded font-bold">Sales WiFi</span>
            </div>
            <nav class="hidden md:flex space-x-8 text-sm font-medium">
                <a href="<?php echo e(route('public.home')); ?>" class="text-gray-600 hover:text-purple-600 transition">Home</a>
                <a href="<?php echo e(route('public.home')); ?>#tentang" class="text-gray-600 hover:text-purple-600 transition">Tentang</a>

                <a href="<?php echo e(route('public.packages.index')); ?>" class="text-gray-600 hover:text-purple-600 transition">Paket Internet</a>
                <a href="<?php echo e(route('public.coverage.check')); ?>" class="text-gray-600 hover:text-purple-600 transition">Cek Area</a>
                <a href="#kontak-kami" class="text-gray-600 hover:text-purple-600 transition">Kontak Kami</a>
            </nav>
            <a href="<?php echo e(route('public.orders.create')); ?>" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition shadow-md shadow-purple-200">
                <i class="fa-brands fa-whatsapp mr-1"></i> Daftar Sekarang
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        <?php if(session('success')): ?>
            <div class="max-w-4xl mx-auto mt-4 px-4">
                <div class="bg-green-50 border border-green-200 text-green-800 rounded-lg p-4 text-sm font-medium">
                    <?php echo e(session('success')); ?>

                </div>
            </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- ===== FOOTER KONTAK KAMI ===== -->
    <footer id="kontak-kami" class="bg-slate-900 text-slate-300">

        <!-- CTA Strip -->
        <div class="bg-purple-700 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">
                <div>
                    <h2 class="text-white text-xl font-bold">Siap Menikmati Internet Super Cepat?</h2>
                    <p class="text-purple-100 text-sm mt-1">Hubungi sales agent kami sekarang dan dapatkan penawaran terbaik hari ini.</p>
                </div>
                <div class="flex flex-wrap gap-3 justify-center md:justify-end shrink-0">
                    <a href="<?php echo e(route('public.orders.create')); ?>"
                       class="bg-white text-purple-700 hover:bg-purple-50 font-bold px-6 py-2.5 rounded-lg text-sm transition shadow-md">
                        <i class="fa-solid fa-wifi mr-1"></i> Daftar Sekarang
                    </a>
                    <a href="https://wa.me/6285946408664?text=Halo%20Sales%20MyRepublic%2C%20saya%20ingin%20tahu%20informasi%20paket%20internet%20lebih%20lanjut."
                       target="_blank"
                       class="bg-green-500 hover:bg-green-600 text-white font-bold px-6 py-2.5 rounded-lg text-sm transition shadow-md">
                        <i class="fa-brands fa-whatsapp mr-1"></i> Chat WhatsApp
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Footer Body -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

            <!-- Kolom 1: Brand & Tentang -->
            <div class="space-y-4">
                <div>
                    <span class="text-2xl font-black text-white tracking-wider">MyRepublic</span>
                    <span class="ml-2 bg-purple-700 text-purple-100 text-xs px-2 py-0.5 rounded font-bold align-middle">Sales Agent</span>
                </div>
                <p class="text-slate-400 text-sm leading-relaxed">
                    Kami adalah agen resmi penjualan layanan internet fiber optik MyRepublic untuk wilayah Anda.
                    Berkomitmen memberikan solusi internet terbaik untuk rumah dan bisnis Anda.
                </p>
                <!-- Social Media -->
                <div class="flex space-x-3 pt-2">
                    <a href="https://www.facebook.com/" target="_blank"
                       class="h-9 w-9 rounded-full bg-slate-800 hover:bg-purple-700 flex items-center justify-center text-sm transition">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/" target="_blank"
                       class="h-9 w-9 rounded-full bg-slate-800 hover:bg-purple-700 flex items-center justify-center text-sm transition">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://www.tiktok.com/" target="_blank"
                       class="h-9 w-9 rounded-full bg-slate-800 hover:bg-purple-700 flex items-center justify-center text-sm transition">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                    <a href="https://www.youtube.com/" target="_blank"
                       class="h-9 w-9 rounded-full bg-slate-800 hover:bg-purple-700 flex items-center justify-center text-sm transition">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Kolom 2: Menu Cepat -->
            <div>
                <h4 class="text-white font-bold text-sm uppercase tracking-widest mb-5">Menu Cepat</h4>
                <ul class="space-y-3 text-sm">
                    <li>
                        <a href="<?php echo e(route('public.home')); ?>" class="footer-link flex items-center gap-2 text-slate-400">
                            <i class="fa-solid fa-chevron-right text-purple-500 text-xs"></i> Beranda
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('public.packages.index')); ?>" class="footer-link flex items-center gap-2 text-slate-400">
                            <i class="fa-solid fa-chevron-right text-purple-500 text-xs"></i> Paket Internet
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('public.coverage.check')); ?>" class="footer-link flex items-center gap-2 text-slate-400">
                            <i class="fa-solid fa-chevron-right text-purple-500 text-xs"></i> Cek Jangkauan Area
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('public.orders.create')); ?>" class="footer-link flex items-center gap-2 text-slate-400">
                            <i class="fa-solid fa-chevron-right text-purple-500 text-xs"></i> Daftar Berlangganan
                        </a>
                    </li>
                    <li>
                        <a href="#kontak-kami" class="footer-link flex items-center gap-2 text-slate-400">
                            <i class="fa-solid fa-chevron-right text-purple-500 text-xs"></i> Kontak Kami
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Kolom 3: Paket Unggulan -->
            <div>
                <h4 class="text-white font-bold text-sm uppercase tracking-widest mb-5">Paket Unggulan</h4>
                <ul class="space-y-3 text-sm">
                    <li>
                        <a href="<?php echo e(route('public.packages.show', 'value-50-mbps')); ?>" class="footer-link flex items-center gap-2 text-slate-400">
                            <i class="fa-solid fa-wifi text-purple-500 text-xs"></i> Value 50 Mbps — Rp 309.000/bln
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('public.packages.show', 'fast-100-mbps')); ?>" class="footer-link flex items-center gap-2 text-slate-400">
                            <i class="fa-solid fa-wifi text-purple-500 text-xs"></i> Fast 100 Mbps — Rp 389.000/bln
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('public.packages.show', 'nova-150-mbps')); ?>" class="footer-link flex items-center gap-2 text-slate-400">
                            <i class="fa-solid fa-wifi text-purple-500 text-xs"></i> Nova 150 Mbps — Rp 469.000/bln
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('public.packages.show', 'gamer-250-mbps')); ?>" class="footer-link flex items-center gap-2 text-slate-400">
                            <i class="fa-solid fa-wifi text-purple-500 text-xs"></i> Gamer 250 Mbps — Rp 599.000/bln
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Kolom 4: Kontak Kami -->
            <div>
                <h4 class="text-white font-bold text-sm uppercase tracking-widest mb-5">Kontak Kami</h4>
                <ul class="space-y-4 text-sm">
                    <!-- WhatsApp -->
                    <li>
                        <a href="https://wa.me/6285946408664" target="_blank"
                           class="flex items-start gap-3 text-slate-400 hover:text-green-400 transition group">
                            <span class="h-9 w-9 rounded-lg bg-green-900/50 group-hover:bg-green-700 flex items-center justify-center shrink-0 transition">
                                <i class="fa-brands fa-whatsapp text-green-400 text-base"></i>
                            </span>
                            <span>
                                <span class="block text-white font-semibold text-xs">WhatsApp / Telepon</span>
                                0859-4640-8664
                            </span>
                        </a>
                    </li>
                    <!-- Jam Operasional -->
                    <li class="flex items-start gap-3 text-slate-400">
                        <span class="h-9 w-9 rounded-lg bg-slate-800 flex items-center justify-center shrink-0">
                            <i class="fa-regular fa-clock text-purple-400 text-base"></i>
                        </span>
                        <span>
                            <span class="block text-white font-semibold text-xs">Jam Operasional</span>
                            Senin – Sabtu: 08.00 – 21.00 WIB<br>
                            Minggu: 09.00 – 17.00 WIB
                        </span>
                    </li>
                    <!-- Email -->
                    <li>
                        <a href="mailto:sales@myrepublic.co.id"
                           class="flex items-start gap-3 text-slate-400 hover:text-purple-400 transition group">
                            <span class="h-9 w-9 rounded-lg bg-slate-800 group-hover:bg-purple-900/50 flex items-center justify-center shrink-0 transition">
                                <i class="fa-regular fa-envelope text-purple-400 text-base"></i>
                            </span>
                            <span>
                                <span class="block text-white font-semibold text-xs">Email</span>
                                sales@myrepublic.co.id
                            </span>
                        </a>
                    </li>
                    <!-- Alamat -->
                    <li class="flex items-start gap-3 text-slate-400">
                        <span class="h-9 w-9 rounded-lg bg-slate-800 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-location-dot text-purple-400 text-base"></i>
                        </span>
                        <span>
                            <span class="block text-white font-semibold text-xs">Area Layanan</span>
                            Melayani pemasangan fiber optik di berbagai wilayah kota Anda.
                        </span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Keunggulan / Badges -->
        <div class="border-t border-slate-800 py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center text-sm">
                    <div class="flex items-center justify-center gap-2 text-slate-400">
                        <i class="fa-solid fa-shield-halved text-purple-400 text-lg"></i>
                        <span>Jaringan Fiber 100%</span>
                    </div>
                    <div class="flex items-center justify-center gap-2 text-slate-400">
                        <i class="fa-solid fa-infinity text-purple-400 text-lg"></i>
                        <span>Unlimited Quota / No FUP</span>
                    </div>
                    <div class="flex items-center justify-center gap-2 text-slate-400">
                        <i class="fa-solid fa-headset text-purple-400 text-lg"></i>
                        <span>Support Pelanggan 24/7</span>
                    </div>
                    <div class="flex items-center justify-center gap-2 text-slate-400">
                        <i class="fa-solid fa-truck-fast text-purple-400 text-lg"></i>
                        <span>Instalasi Cepat & Gratis</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar Copyright -->
        <div class="border-t border-slate-800 py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-2 text-xs text-slate-500">
                <p>&copy; <?php echo e(date('Y')); ?> <span class="text-slate-300 font-semibold">MyRepublic Sales Agent</span>. Semua Hak Cipta Dilindungi.</p>
                <p>Agen Resmi Penjualan Internet Fiber Optik MyRepublic Indonesia</p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/6285946408664?text=Halo%20Sales%20MyRepublic%2C%20saya%20ingin%20tahu%20informasi%20paket%20internet%20lebih%20lanjut."
       target="_blank"
       class="wa-float h-14 w-14 bg-green-500 hover:bg-green-600 rounded-full flex items-center justify-center text-white text-2xl shadow-lg transition"
       title="Chat WhatsApp Sekarang">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravelforfun\resources\views/layouts/myrepublic.blade.php ENDPATH**/ ?>