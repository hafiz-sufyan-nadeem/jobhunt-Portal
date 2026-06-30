@extends('layout.app')

@section('title', 'Admin Dashboard')
@section('nav-links')
    @auth
        <span class="text-gray-600 text-sm hidden md:block">
            Hi, {{ auth()->user()->name }}
        </span>
    @endauth

    @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg text-sm">
                Logout
            </button>
        </form>
    @endauth
@endsection

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-10">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-100">
                Admin Dashboard
            </h1>
            <p class="text-gray-400 mt-2">
                Overview of your platform activity.
            </p>
        </div>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                <p class="text-gray-400 text-sm">Total Users</p>
                <h2 class="text-4xl font-bold text-white mt-2">
                    {{ $totalUsers }}
                </h2>
            </div>

            <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                <p class="text-gray-400 text-sm">Total Jobs</p>
                <h2 class="text-4xl font-bold text-white mt-2">
                    {{ $totalJobs }}
                </h2>
            </div>

            <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                <p class="text-gray-400 text-sm">Total Applications</p>
                <h2 class="text-4xl font-bold text-white mt-2">
                    {{ $totalApplications }}
                </h2>
            </div>

        </div>

        {{-- Quick Actions --}}
        <div class="flex flex-wrap gap-3 mb-10">

            <a href="{{ route('admin.jobs') }}"
               class="px-5 py-3 bg-indigo-600 hover:bg-indigo-500 rounded-lg text-white font-medium transition">
                Manage Jobs
            </a>

            <a href="{{ route('admin.users') }}"
               class="px-5 py-3 bg-gray-800 hover:bg-gray-700 rounded-lg text-white font-medium transition">
                Manage Users
            </a>

        </div>

        {{-- Information Cards --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-white mb-4">
                    Platform Summary
                </h3>

                <ul class="space-y-3 text-gray-300">
                    <li>👥 Registered Users: {{ $totalUsers }}</li>
                    <li>💼 Published Jobs: {{ $totalJobs }}</li>
                    <li>📄 Submitted Applications: {{ $totalApplications }}</li>
                </ul>
            </div>

            <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-white mb-4">
                    Admin Actions
                </h3>

                <ul class="space-y-3 text-gray-300">
                    <li>✅ Review Job Listings</li>
                    <li>✅ Manage Employers</li>
                    <li>✅ Manage Candidates</li>
                    <li>✅ Monitor Applications</li>
                </ul>
            </div>

        </div>
    </div>
@endsection
