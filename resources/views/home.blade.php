@extends('layout.app')

@section('title', 'Home')

@section('nav-links')
    @auth
        <span class="text-gray-600 text-sm hidden md:block">Hi, {{ auth()->user()->name }}</span>

        @if(auth()->user()->role === 'employer')
            <a href="{{ route('employer.index') }}" class="px-4 py-2 border border-blue-500 text-white hover:bg-blue-500 rounded-lg text-sm">Dashboard</a>
            <a href="{{ route('jobs.index') }}" class="px-4 py-2 border border-blue-500 text-white hover:bg-blue-500 rounded-lg text-sm">My Jobs</a>
            <a href="{{ route('employer.applications') }}" class="px-4 py-2 border border-blue-500 text-white hover:bg-blue-500 rounded-lg text-sm">Applications</a>
        @elseif(auth()->user()->role === 'candidate')
            <a href="{{ route('candidate.index') }}" class="px-4 py-2 border border-blue-500 text-white hover:bg-blue-500 rounded-lg text-sm">My Profile</a>
            <a href="{{ route('applications.index') }}" class="px-4 py-2 border border-blue-500 text-white hover:bg-blue-500 rounded-lg text-sm">My Applications</a>
        @elseif(auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 border border-blue-500 text-white hover:bg-blue-500 rounded-lg text-sm">Admin Panel</a>
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
    {{-- ===== HERO + SEARCH ===== --}}
    <section class="bg-gradient-to-br from-gray-900 via-gray-950 to-gray-900 py-16 px-4 border-b border-gray-800">
        <div class="max-w-3xl mx-auto text-center">

            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mb-3">
                Find Your <span class="text-indigo-500">Dream Job</span>
            </h1>
            <p class="text-gray-400 text-base mb-8">Thousands of jobs listed — search, apply, and grow.</p>

            <form action="{{ route('home') }}" method="GET"
                  class="flex flex-col sm:flex-row gap-3 justify-center">

                <input type="text" name="search" placeholder="🔍  Job title or keyword..."
                       value="{{ request('search') }}"
                       class="flex-1 bg-gray-950 border border-gray-700 text-gray-200 placeholder-gray-600 rounded-lg px-4 py-2.5 text-sm outline-none focus:border-indigo-500 transition">

                <input type="text" name="city" placeholder="📍  City..."
                       value="{{ request('city') }}"
                       class="flex-1 bg-gray-950 border border-gray-700 text-gray-200 placeholder-gray-600 rounded-lg px-4 py-2.5 text-sm outline-none focus:border-indigo-500 transition">

                <select name="type"
                        class="bg-gray-950 border border-gray-700 text-gray-200 rounded-lg px-4 py-2.5 text-sm outline-none focus:border-indigo-500 transition">
                    <option value="">All Types</option>
                    <option value="full-time"  {{ request('type') == 'full-time'  ? 'selected' : '' }}>Full-time</option>
                    <option value="part-time"  {{ request('type') == 'part-time'  ? 'selected' : '' }}>Part-time</option>
                    <option value="remote"     {{ request('type') == 'remote'     ? 'selected' : '' }}>Remote</option>
                </select>

                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm px-6 py-2.5 rounded-lg transition whitespace-nowrap">
                    Search
                </button>

            </form>
        </div>
    </section>

    {{-- ===== JOB LISTINGS ===== --}}
    <main class="max-w-6xl mx-auto px-4 py-10">

        @if($jobs->count())
            <p class="text-sm text-gray-500 mb-5">{{ $jobs->count() }} job(s) found</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($jobs as $job)

                    <div class="bg-gray-900 border border-gray-800 border-l-4 border-l-indigo-600 rounded-xl p-5 hover:-translate-y-1 hover:border-indigo-500 hover:shadow-lg hover:shadow-indigo-950 transition-all duration-200">

                        <p>{{ $job->employer->company_name }}</p>

                        <a href="{{ route('jobs.show', $job->id) }}">
                            <h3 class="text-base font-bold text-gray-100 mb-2">{{ $job->title }}</h3>
                        </a>

                        <p class="text-sm text-gray-400 mb-4">📍 {{ $job->city }}</p>

                        <div class="flex flex-wrap gap-2 mb-5">
                            <span class="text-xs font-semibold px-3 py-1 rounded-full bg-gray-800 text-indigo-300 border border-gray-700 capitalize">
                                {{ $job->type }}
                            </span>
                            <span class="text-xs font-semibold px-3 py-1 rounded-full bg-indigo-950 text-indigo-400 border border-indigo-900">
                                {{ $job->salary_range }}
                            </span>
                        </div>

                        <a href="{{ route('jobs.show', $job->id) }}"
                           class="w-full block text-center border border-indigo-600 text-indigo-400 text-sm font-semibold py-2 rounded-lg hover:bg-indigo-600 hover:text-white transition">
                            View Details →
                        </a>

                    </div>

                @endforeach
            </div>

        @else
            <div class="text-center py-20 text-gray-600">
                <div class="text-5xl mb-4">🔍</div>
                <p class="text-base">No jobs found. Try different keywords.</p>
            </div>
        @endif

    </main>
@endsection
