<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Yamaha Inventory') }}</title>

    {{-- Load Tailwind / Vite --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="/build/assets/app.css" />
    @endif
</head>

<body class="min-h-screen bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col">
    {{-- NAVBAR --}}
    <nav class="bg-blue-700 text-white py-3 px-6 shadow">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            {{-- Left: Logo --}}
            <a href="{{ route('dashboard.index') }}" class="font-bold text-lg tracking-wide hover:text-gray-200">
                Yamaha Inventory
            </a>

            {{-- Center: Navigation Links --}}
            <div class="hidden md:flex gap-6">
                <a href="{{ route('dashboard.index') }}" class="hover:underline {{ request()->routeIs('dashboard.index') ? 'font-semibold' : '' }}">Dashboard</a>
                <a href="{{ route('parts.index') }}" class="hover:underline {{ request()->routeIs('parts.*') ? 'font-semibold' : '' }}">Parts</a>
                <a href="{{ route('spareparts.index') }}" class="hover:underline {{ request()->routeIs('spareparts.*') ? 'font-semibold' : '' }}">Spareparts</a>
                <a href="{{ route('dashboard.transactions') }}" class="hover:underline {{ request()->routeIs('dashboard.transactions') ? 'font-semibold' : '' }}">Transaksi</a>
            </div>

            {{-- Right: User / Logout --}}
            <div class="flex items-center gap-3">
                @auth
                    <span class="text-sm hidden sm:inline">👋 {{ auth()->user()->nama ?? 'User' }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm px-3 py-1 rounded-md">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm hover:underline">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 max-w-7xl mx-auto w-full p-6">
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 border border-green-300 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-gray-100 dark:bg-[#161615] py-4 border-t border-gray-300 text-center text-sm text-gray-500">
        © {{ date('Y') }} Yamaha Service & Inventory — All Rights Reserved
    </footer>
</body>
</html>
