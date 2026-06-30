@extends('layout.app')

@section('title', 'Edit Profile')

@section('nav-links')
    @auth
        <span class="text-gray-600 text-sm hidden md:block">Hi, {{ auth()->user()->name }}</span>
        <a href="{{ route('jobs.index') }}" class="px-4 py-2 border border-blue-500 text-white hover:bg-blue-500 rounded-lg text-sm">My Jobs</a>
        <a href="{{ route('employer.applications') }}" class="px-4 py-2 border border-blue-500 text-white hover:bg-blue-500 rounded-lg text-sm">Applications</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg text-sm">Logout</button>
        </form>
    @endauth
@endsection

@section('content')
    <div class="max-w-2xl mx-auto px-4 pt-24 pb-12">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

            <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Company Profile</h2>

            <form action="{{ route('employer.update', $employer->id) }}" method="POST">
                @csrf
                @method('PATCH')

                {{-- Company Name --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
                    <input
                        type="text"
                        name="company_name"
                        value="{{ $employer->company_name }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100"
                    >
                </div>

                {{-- City --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                    <input
                        type="text"
                        name="city"
                        value="{{ $employer->city }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100"
                    >
                </div>

                {{-- Description --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea
                        name="description"
                        rows="4"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100"
                    >{{ $employer->description }}</textarea>
                </div>

                {{-- Buttons --}}
                <div class="flex gap-3">
                    <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 transition">
                        Update Profile
                    </button>
                    <a href="{{ route('employer.index') }}" class="px-6 py-2.5 border border-gray-200 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-50 transition">
                        Cancel
                    </a>
                </div>

            </form>

        </div>

    </div>
@endsection
