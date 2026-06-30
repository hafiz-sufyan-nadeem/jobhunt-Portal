<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') — JobHunt</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">

{{-- Navbar --}}
<nav class="bg-white shadow-md fixed w-full z-20 top-0">
    <div class="max-w-screen-xl mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">💼 JobHunt</a>
        <div class="flex items-center gap-3">
            @yield('nav-links') {{-- har page apne links yahan dega --}}
        </div>
    </div>
</nav>

{{-- Main Content --}}
<div class="pt-16">
    @yield('content') {{-- har page ka content yahan aayega --}}
</div>

{{-- Footer --}}
<footer class="bg-gray-900 border-t border-gray-800 mt-16 px-4 pt-10 pb-6">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-8 mb-8">

            {{-- Brand --}}
            <div class="col-span-2 sm:col-span-1">
                <p class="text-base font-extrabold tracking-tight mb-2">
                    <span class="text-indigo-500">Job</span><span class="text-gray-100">Hunt</span>
                </p>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Pakistan ka number 1 job portal. Apna career shuru karo aaj se.
                </p>
            </div>

            {{-- Jobs --}}
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-widest mb-3">Jobs</p>
                <div class="flex flex-col gap-2">
                    <a href="{{ route('home', ['type' => 'full-time']) }}"  class="text-sm text-gray-400 hover:text-indigo-400 transition">Full-time</a>
                    <a href="{{ route('home', ['type' => 'part-time']) }}"  class="text-sm text-gray-400 hover:text-indigo-400 transition">Part-time</a>
                    <a href="{{ route('home', ['type' => 'remote']) }}"     class="text-sm text-gray-400 hover:text-indigo-400 transition">Remote</a>
                </div>
            </div>

            {{-- Account --}}
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-widest mb-3">Account</p>
                <div class="flex flex-col gap-2">
                    <a href="/login"    class="text-sm text-gray-400 hover:text-indigo-400 transition">Login</a>
                    <a href="/register" class="text-sm text-gray-400 hover:text-indigo-400 transition">Register</a>
                </div>
            </div>

            {{-- Company --}}
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-widest mb-3">Company</p>
                <div class="flex flex-col gap-2">
                    <a href="#" class="text-sm text-gray-400 hover:text-indigo-400 transition">About</a>
                    <a href="#" class="text-sm text-gray-400 hover:text-indigo-400 transition">Contact</a>
                    <a href="#" class="text-sm text-gray-400 hover:text-indigo-400 transition">Privacy policy</a>
                </div>
            </div>

        </div>

        {{-- Bottom bar --}}
        <div class="border-t border-gray-800 pt-5 flex flex-wrap justify-between items-center gap-2">
            <p class="text-xs text-gray-600">© {{ date('Y') }} JobHunt Portal. All rights reserved.</p>
            <p class="text-xs text-gray-600">Made with <span class="text-indigo-500">♥</span> in Pakistan</p>
        </div>

    </div>
</footer>

</body>
</html>
