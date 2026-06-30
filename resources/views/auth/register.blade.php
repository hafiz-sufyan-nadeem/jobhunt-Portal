<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — JobHunt</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-950">

<div class="w-full max-w-md mx-auto px-4">

    {{-- Logo --}}
    <div class="text-center mb-8">
        <a href="{{ route('home') }}" class="text-3xl font-bold text-blue-600">💼 JobHunt</a>
        <p class="text-gray-400 mt-2 text-xl">Welcome</p>
    </div>

    {{-- Card --}}
    <div class="bg-white rounded-2xl shadow-md p-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-white text-white"
                    placeholder="enter your name"
                >

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

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        required
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-white"
                        placeholder="••••••••"
                    >
                    @error('confirm password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Register As</label>
                    <select name="role" class="w-full px-4 py-3 border border-gray-200 rounded-lg text-white">
                        <option value="employer">Employer</option>
                        <option value="candidate">Candidate</option>
                    </select>
                </div>

            {{-- Submit --}}
            <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
                Register →
            </button>
            </div>
        </form>
    </div>

    {{-- Register Link --}}
    <p class="text-center text-gray-400 text-sm mt-6">
        Already have account?
        <a href="{{ route('login') }}" class="text-blue-500 hover:underline font-medium">Login here</a>
    </p>

</div>

</body>
</html>
