@extends('layout.app')

@section('title', 'Create Profile')

@section('nav-links')
    @auth
        <span class="text-gray-600 text-sm hidden md:block">Hi, {{ auth()->user()->name }}</span>
        <a href="{{ route('applications.index') }}" class="px-4 py-2 border border-blue-500 text-white hover:bg-blue-500 rounded-lg text-sm">My Applications</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg text-sm">Logout</button>
        </form>
    @endauth
@endsection

@section('content')
    <div class="max-w-2xl mx-auto px-4 pt-24 pb-12">
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">

            <h2 class="text-2xl font-bold text-gray-100 mb-6">Create Candidate Profile</h2>

            <form action="{{ route('candidate.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-400 mb-1">Headline</label>
                    <input
                        type="text"
                        name="headline"
                        class="w-full px-4 py-3 bg-gray-950 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-200"
                    >
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-400 mb-1">Phone</label>
                    <input
                        type="text"
                        name="phone"
                        class="w-full px-4 py-3 bg-gray-950 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-200"
                    >
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-400 mb-1">City</label>
                    <input
                        type="text"
                        name="city"
                        class="w-full px-4 py-3 bg-gray-950 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-200"
                    >
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-400 mb-1">Skills</label>
                    <textarea
                        name="skills"
                        class="w-full px-4 py-3 bg-gray-950 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-200">
                    </textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-400 mb-1">Resume</label>
                    <input
                        type="file"
                        name="resume"
                        class="w-full px-4 py-3 bg-gray-950 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-200 text-sm"
                    >
                </div>

                {{-- Buttons --}}
                <div class="flex gap-3">
                    <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
                        Create Profile
                    </button>
                </div>

            </form>

        </div>
    </div>
@endsection
