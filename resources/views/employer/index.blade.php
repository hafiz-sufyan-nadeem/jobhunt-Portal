@extends('layout.app')

@section('title', 'Home')

@section('nav-links')
    @auth
        <span class="text-gray-600 text-sm hidden md:block">Hi, {{ auth()->user()->name }}</span>
        <a href="{{ route('jobs.index') }}" class="px-4 py-2 border border-blue-500 text-white hover:bg-blue-500 rounded-lg text-sm">My Jobs</a>
        <a href="{{ route('employer.applications') }}" class="px-4 py-2 border border-blue-500 text-white hover:bg-blue-500 rounded-lg text-sm">Applications</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg text-sm">Logout</button>
        </form>
    @else
        <a href="/login" class="px-4 py-2 border border-blue-500 text-blue-500 rounded-lg text-sm">Login</a>
        <a href="/register" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">Register</a>
    @endauth
@endsection

@section('content')
    {{-- Content --}}
    <div class="max-w-screen-xl mx-auto px-4 pt-24 pb-12">

        {{-- Profile Card --}}
        <div class="bg-gray-950 rounded-2xl shadow-sm border border-gray-100 p-8 max-w-2xl mx-auto hover: hover:border-indigo-700 hover:shadow-xl hover:shadow-purple-950">

            {{-- Avatar --}}
            <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 font-bold text-3xl mb-6">
                {{ strtoupper(substr($employers->company_name, 0, 2)) }}
            </div>

            <h2 class="text-2xl font-bold text-gray-600 mb-1">{{ $employers->company_name }}</h2>
            <p class="text-gray-400 text-sm mb-4">📍 {{ $employers->city }}</p>
            <p class="text-gray-600 mb-6">{{ $employers->description }}</p>

            <a href="{{ route('employer.edit', $employers->id) }}"
               class="px-6 py-2.5 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 transition">
                Edit Profile
            </a>
        </div>

        {{-- Quick Stats --}}
        <div class="grid grid-cols-2 gap-4 max-w-2xl mx-auto mt-6">
            <a href="{{ route('jobs.index') }}"
               class="bg-gray-950 rounded-xl border border-gray-100 p-6 text-center hover:border-indigo-700 hover:shadow-xl hover:shadow-purple-950">
                <p class="text-3xl font-bold text-blue-600">{{ auth()->user()->employer->jobs->count() }}</p>
                <p class="text-gray-400 text-sm mt-1">Total Jobs Posted</p>
            </a>
            <a href="{{ route('employer.applications') }}"
               class="bg-gray-950 rounded-xl border border-gray-100 p-6 text-center hover:border-indigo-700 hover:shadow-xl hover:shadow-purple-950">
                <p class="text-3xl font-bold text-blue-600">{{ auth()->user()->employer->jobs->sum(fn($job) => $job->applications->count()) }}</p>
                <p class="text-gray-400 text-sm mt-1">Total Applications</p>
            </a>
        </div>

    </div>

@endsection
