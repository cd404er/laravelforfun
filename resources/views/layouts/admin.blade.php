<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyRepublic Admin Panel</title>
    <!-- Tailwind CSS (via CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans text-gray-800 min-h-screen flex flex-col md:flex-row">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-slate-900 text-slate-300 flex flex-col shrink-0">
        <div class="h-16 flex items-center justify-between px-6 bg-slate-950 text-white border-b border-slate-800">
            <span class="text-xl font-bold tracking-wider text-purple-400">MyRepublic Admin</span>
        </div>
        <nav class="flex-grow p-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium hover:bg-slate-800 hover:text-white transition">
                Dashboard
            </a>
            <a href="{{ route('admin.packages.index') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium hover:bg-slate-800 hover:text-white transition">
                Kelola Paket
            </a>
            <a href="{{ route('admin.orders.index') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium hover:bg-slate-800 hover:text-white transition">
                Pesanan / Registrasi
            </a>
            <a href="{{ route('admin.coverage-checks.index') }}" class="block px-4 py-2.5 rounded-lg text-sm font-medium hover:bg-slate-800 hover:text-white transition">
                Cek Coverage Wilayah
            </a>
            <hr class="border-slate-800 my-4">
            <a href="{{ route('public.home') }}" target="_blank" class="block px-4 py-2.5 rounded-lg text-sm font-medium hover:bg-slate-800 hover:text-white transition text-slate-400 italic">
                Lihat Web Publik &rarr;
            </a>
        </nav>
        <div class="p-4 border-t border-slate-800 text-xs text-slate-500">
            Masuk sebagai: <span class="text-slate-300 font-bold">{{ Auth::user() ? Auth::user()->name : 'Guest' }}</span>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-grow flex flex-col min-h-screen overflow-x-hidden">
        <!-- Top Nav -->
        <header class="h-16 bg-white border-b flex items-center justify-between px-6 shrink-0">
            <h2 class="text-lg font-semibold text-gray-800">@yield('page_title', 'Admin Dashboard')</h2>
            <div class="flex items-center space-x-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800 transition">
                        Keluar
                    </button>
                </form>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-grow p-6">
            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 rounded-lg p-4 text-sm font-medium">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
