@extends('layout.app')

@section('title', 'Post a Job')

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
    <div class="max-w-2xl mx-auto pt-24 pb-12 px-4">
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8">

            <h2 class="text-2xl font-bold text-gray-800 mb-6">Post a Job</h2>

            <form action="{{ route('jobs.store') }}" method="POST">
                @csrf

                {{-- Title --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Job Title</label>
                    <input type="text" name="title" placeholder="e.g., Senior Frontend Developer" required
                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100">
                </div>

                {{-- Description --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Job Description</label>
                    <textarea name="description" rows="4" placeholder="Enter job duties and requirements..." required
                              class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100"></textarea>
                </div>

                {{-- Type --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Job Type</label>
                    <select name="type" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100">
                        <option value="" disabled selected>Select job type</option>
                        <option value="full-time">Full-time</option>
                        <option value="part-time">Part-time</option>
                        <option value="remote">Remote</option>
                    </select>
                </div>

                {{-- Category --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select name="category_id" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- City --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">City</label>
                    <input type="text" name="city" placeholder="e.g., Lahore" required
                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100">
                </div>

                {{-- Salary Range --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Salary Range</label>
                    <input type="text" name="salary_range" placeholder="e.g., 80,000 - 100,000" required
                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100">
                </div>

                {{-- Deadline --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Application Deadline</label>
                    <input type="date" name="deadline" required
                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100">
                </div>

                {{-- Submit --}}
                <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
                    Publish Job →
                </button>

            </form>

        </div>
    </div>
@endsection
