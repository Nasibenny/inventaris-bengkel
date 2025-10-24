<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Yamaha Inventory') }}</title>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <link rel="stylesheet" href="/build/assets/app.css" />
        @endif
    </head>
    <body class="min-h-screen bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18]">
        <nav class="p-4 bg-white dark:bg-[#161615] border-b border-[#e3e3e0]">
            <div class="max-w-6xl mx-auto flex justify-between items-center">
                <a href="{{ route('parts.index') }}" class="font-medium text-white">Yamaha Parts</a>
                <div class="flex items-center gap-3">
                    <a href="{{ route('parts.index') }}" class="text-sm text-white">Parts</a>
                    <a href="{{ route('parts.create') }}" class="text-sm text-white">Add Part</a>
                </div>
            </div>
        </nav>

        <main class="max-w-6xl mx-auto p-6">
            @if(session('success'))
                <div class="mb-4 p-3 bg-white border border-[#e3e3e0] rounded-sm">{{ session('success') }}</div>
            @endif
            @yield('content')
        </main>
    </body>
</html>
