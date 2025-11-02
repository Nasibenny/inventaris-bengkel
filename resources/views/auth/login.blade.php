<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Yamaha Inventory</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen text-gray-100">

    <div class="bg-gray-800 p-10 rounded-2xl shadow-xl w-96 text-center">
        <div class="mb-6">
            <img src="/images/yamaha-logo.png" alt="Yamaha" class="w-16 mx-auto mb-3">
            <h1 class="text-3xl font-bold tracking-wide">YAMAHA</h1>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf
            <div class="text-left">
                <label for="email" class="text-sm font-semibold">Email/Username</label>
                <input type="text" name="email" id="email" required
                       class="w-full mt-2 px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-yellow-400 focus:outline-none">
            </div>

            <div class="text-left">
                <label for="password" class="text-sm font-semibold">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full mt-2 px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-yellow-400 focus:outline-none">
            </div>

            <div class="text-right">
                <a href="{{ route('password.request') }}" class="text-yellow-400 text-sm hover:underline">
                    Forgot password
                </a>
            </div>

            <button type="submit"
                    class="w-full bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-bold py-2 rounded-lg transition">
                LOGIN
            </button>
        </form>
    </div>

</body>
</html>
