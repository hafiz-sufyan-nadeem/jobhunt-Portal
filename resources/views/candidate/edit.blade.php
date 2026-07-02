@extends('layout.app')

@section('title', 'Edit Profile')

@section('nav-links')
    @auth
        <span class="text-gray-600 text-sm hidden md:block">Hi, {{ auth()->user()->name }}</span>
        <a href="{{ route('applications.index') }}" class="px-4 py-2 border border-blue-500 text-white hover:bg-blue-500 rounded-lg text-sm">My Applications</a>
        <a href="{{ route('home') }}" class="px-4 py-2 border border-gray-600 text-white hover:bg-gray-800 rounded-lg text-sm">Home</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg text-sm">Logout</button>
        </form>
    @endauth
@endsection

@section('content')
    <div class="max-w-2xl mx-auto px-4 pt-24 pb-12">
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">

            <h2 class="text-2xl font-bold text-gray-100 mb-6">Edit Candidate Profile</h2>

            <form action="{{ route('candidate.update', $candidate->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-400 mb-1">Headline</label>
                    <input
                        type="text"
                        name="headline"
                        value="{{ $candidate->headline }}"
                        class="w-full px-4 py-3 bg-gray-950 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-200"
                    >
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-400 mb-1">Phone</label>
                    <input
                        type="text"
                        name="phone"
                        value="{{ $candidate->phone }}"
                        class="w-full px-4 py-3 bg-gray-950 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-200"
                    >
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-400 mb-1">City</label>
                    <input
                        type="text"
                        name="city"
                        value="{{ $candidate->city }}"
                        class="w-full px-4 py-3 bg-gray-950 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-200"
                    >
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-400 mb-1">Skills</label>
                    <textarea
                        name="skills"
                        rows="3"
                        class="w-full px-4 py-3 bg-gray-950 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-200"
                    >{{ $candidate->skills }}</textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-400 mb-1">Resume</label>
                    @if($candidate->resume)
                        <p class="text-xs text-gray-500 mb-2">Current: <a href="{{ asset('storage/' . $candidate->resume) }}" target="_blank" class="text-indigo-400 hover:underline">View existing resume</a></p>
                    @endif
                    <input
                        type="file"
                        name="resume"
                        class="w-full px-4 py-3 bg-gray-950 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-200 text-sm"
                    >
                </div>

                {{-- Buttons --}}
                <div class="flex gap-3">
                    <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
                        Update Profile
                    </button>
                    <a href="{{ route('candidate.index') }}" class="px-6 py-2.5 border border-gray-700 text-gray-400 rounded-lg text-sm font-medium hover:bg-gray-800 transition">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>
@endsection
