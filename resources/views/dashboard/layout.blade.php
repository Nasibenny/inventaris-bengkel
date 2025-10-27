<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yamaha Inventory</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-gray-200 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-72 bg-gray-800 p-8 flex flex-col justify-between shadow-lg">
        <div>
            <!-- Logo dan Judul -->
            <h1 class="text-3xl font-extrabold mb-12 flex items-center space-x-3">
                <span class="text-yellow-400 text-4xl">🛠️</span>
                <span class="tracking-wide">YAMAHA</span>
            </h1>

            <!-- Navigasi -->
            <nav class="space-y-5 text-lg">
                <a href="{{ route('dashboard.index') }}"
                   class="flex items-center gap-4 text-gray-300 hover:text-yellow-400 hover:bg-gray-700 px-5 py-3 rounded-xl transition-all">
                    <span class="text-2xl">🏠</span>
                    <span class="font-semibold">Dashboard</span>
                </a>

                <a href="{{ route('dashboard.spareparts') }}"
                   class="flex items-center gap-4 text-gray-300 hover:text-yellow-400 hover:bg-gray-700 px-5 py-3 rounded-xl transition-all">
                    <span class="text-2xl">⚙️</span>
                    <span class="font-semibold">Spare Parts</span>
                </a>

                <a href="{{ route('dashboard.notifications') }}"
                   class="flex items-center gap-4 text-gray-300 hover:text-yellow-400 hover:bg-gray-700 px-5 py-3 rounded-xl transition-all">
                    <span class="text-2xl">🔔</span>
                    <span class="font-semibold">Notifications</span>
                </a>

                <a href="#"
                   class="flex items-center gap-4 text-gray-300 hover:text-yellow-400 hover:bg-gray-700 px-5 py-3 rounded-xl transition-all">
                    <span class="text-2xl">📑</span>
                    <span class="font-semibold">Transactions</span>
                </a>

                <a href="#"
                   class="flex items-center gap-4 text-gray-300 hover:text-yellow-400 hover:bg-gray-700 px-5 py-3 rounded-xl transition-all">
                    <span class="text-2xl">⚙️</span>
                    <span class="font-semibold">Settings</span>
                </a>
            </nav>
        </div>

        <!-- Logout -->
        <div class="pt-6 border-t border-gray-700">
            <a href="{{ route('logout') }}"
               class="flex items-center gap-3 text-gray-400 hover:text-red-500 text-lg transition-all">
                <span class="text-2xl">🚪</span>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10">
        @yield('content')
    </main>

</body>
</html>
