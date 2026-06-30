<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — JobHunt</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-950">

<div class="w-full max-w-md mx-auto px-4">

    {{-- Logo --}}
    <div class="text-center mb-8">
        <a href="{{ route('home') }}" class="text-3xl font-bold text-blue-600">💼 JobHunt</a>
        <p class="text-gray-400 mt-2 text-sm">Welcome back! Login to continue</p>
    </div>

    {{-- Card --}}
    <div class="bg-white rounded-2xl shadow-md p-8">

        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Login</h2>

        {{-- Session Status --}}
        @if(session('status'))
            <div class="mb-4 p-3 bg-green-50 text-green-600 rounded-lg text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-white text-white"
                    placeholder="you@example.com"
                >
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-white"
                    placeholder="••••••••"
                >
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember Me --}}
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center gap-2 text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600">
                    Remember me
                </label>
                @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">
                        Forgot password?
                    </a>
                @endif
            </div>

            {{-- Submit --}}
            <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
                Login →
            </button>

        </form>

    </div>

    {{-- Register Link --}}
    <p class="text-center text-gray-400 text-sm mt-6">
        Don't have an account?
        <a href="{{ route('register') }}" class="text-blue-500 hover:underline font-medium">Register here</a>
    </p>

</div>

</body>
</html>
