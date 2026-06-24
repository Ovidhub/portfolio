<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login — {{ config('app.name') }}</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-[#1a3c2a] min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl p-8 w-full max-w-md shadow-2xl">
        <div class="text-center mb-8">
            <div class="w-14 h-14 bg-[#f5a623] rounded-full flex items-center justify-center mx-auto mb-4">
                <x-icon name="code" class="w-7 h-7 text-[#1a3c2a]" />
            </div>
            <h1 class="text-3xl font-bold text-[#1a3c2a]">Admin Login</h1>
            <p class="text-gray-500 mt-2">Sign in to manage your portfolio</p>
        </div>

        <form action="{{ route('admin.login.attempt') }}" method="POST" class="space-y-6">
            @csrf

            @if ($errors->any())
                <div class="bg-red-50 text-red-600 p-3 rounded-lg text-sm">{{ $errors->first() }}</div>
            @endif

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#f5a623] focus:border-transparent outline-none"
                       placeholder="admin@example.com">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#f5a623] focus:border-transparent outline-none"
                       placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
            </div>

            <label class="flex items-center gap-2 text-sm text-gray-600">
                <input type="checkbox" name="remember" class="rounded border-gray-300 text-[#1a3c2a] focus:ring-[#f5a623]">
                Remember me
            </label>

            <button type="submit" class="w-full bg-[#1a3c2a] text-white py-3 rounded-xl font-semibold hover:bg-[#2d5a3d] transition-colors">Sign In</button>
        </form>
    </div>
</body>
</html>
