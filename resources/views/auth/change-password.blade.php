<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - Yamaha Inventory</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen text-gray-100">

    <div class="bg-gray-800 p-10 rounded-2xl shadow-xl w-96 text-center">
        <div class="mb-6">
            <img src="/images/yamaha-logo.png" alt="Yamaha" class="w-16 mx-auto mb-3">
            <h1 class="text-3xl font-bold tracking-wide">YAMAHA</h1>
            <p class="text-xl mt-4 font-semibold">Change Password</p>
        </div>

        <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
            @csrf
            <div class="text-left">
                <label for="current_password" class="text-sm font-semibold">Current Password</label>
                <input type="password" name="current_password" id="current_password" required
                       class="w-full mt-2 px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-yellow-400 focus:outline-none">
            </div>

            <div class="text-left">
                <label for="new_password" class="text-sm font-semibold">New Password</label>
                <input type="password" name="new_password" id="new_password" required
                       class="w-full mt-2 px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-yellow-400 focus:outline-none">
            </div>

            <div class="text-left">
                <label for="new_password_confirmation" class="text-sm font-semibold">Confirm New Password</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" required
                       class="w-full mt-2 px-4 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-yellow-400 focus:outline-none">
            </div>

            <button type="submit"
                    class="w-full bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-bold py-2 rounded-lg transition">
                Update
            </button>
        </form>
    </div>

</body>
</html>
