@extends('layout.app')

@section('title', $job->title)

@section('nav-links')
    @auth
        @if(auth()->user()->role === 'candidate')
            <a href="{{ route('applications.index') }}" class="px-4 py-2 border border-blue-500 text-white hover:bg-blue-500 rounded-lg text-sm">My Applications</a>
        @endif
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg text-sm">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}" class="px-4 py-2 border border-blue-500 text-blue-500 rounded-lg text-sm">Login</a>
        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">Register</a>
    @endauth
@endsection

@section('content')
    <div class="max-w-3xl mx-auto px-4 pt-24 pb-12">

        {{-- Back button --}}
        <a href="{{ route('home') }}" class="text-indigo-400 text-sm hover:underline mb-6 inline-block">
            ← Back to Jobs
        </a>

        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">

            {{-- Company --}}
            <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 bg-indigo-950 rounded-xl flex items-center justify-center text-indigo-400 font-bold text-xl">
                    {{ strtoupper(substr($job->employer->company_name, 0, 2)) }}
                </div>
                <div>
                    <p class="text-indigo-400 text-sm">{{ $job->employer->company_name }}</p>
                    <h1 class="text-2xl font-bold text-gray-100">{{ $job->title }}</h1>
                </div>
            </div>

            {{-- Meta --}}
            <div class="flex flex-wrap gap-3 mb-6">
                <span class="px-3 py-1.5 bg-gray-800 text-indigo-300 text-xs rounded-full font-medium">{{ $job->type }}</span>
                <span class="px-3 py-1.5 bg-gray-800 text-gray-300 text-xs rounded-full">📍 {{ $job->city }}</span>
                <span class="px-3 py-1.5 bg-gray-800 text-green-400 text-xs rounded-full">💰 {{ $job->salary_range }}</span>
                <span class="px-3 py-1.5 bg-gray-800 text-yellow-400 text-xs rounded-full">⏰ Deadline: {{ $job->deadline }}</span>
            </div>

            {{-- Description --}}
            <div class="mb-8">
                <h3 class="text-gray-300 font-semibold mb-3">Job Description</h3>
                <p class="text-gray-400 leading-relaxed">{{ $job->description }}</p>
            </div>

            {{-- Apply Button --}}
            @auth
                @if(auth()->user()->role === 'candidate')
                    <form action="{{ route('applications.store', $job->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition">
                            Apply Now →
                        </button>
                    </form>
                @endif
            @else
                <a href="{{ route('login') }}" class="block text-center w-full py-3 border-2 border-indigo-600 text-indigo-400 rounded-lg font-semibold hover:bg-indigo-950 transition">
                    Login to Apply
                </a>
            @endauth

        </div>

    </div>
@endsection
