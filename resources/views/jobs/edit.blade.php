@extends('layout.app')

@section('title', 'Edit a Job')

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

            <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Job</h2>

            <form action="{{ route('jobs.update', $job->id) }}" method="POST">
                @csrf
                @method('PATCH')

                {{-- Title --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Job Title</label>
                    <input type="text" name="title" value="{{ $job->title }}" required
                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100">
                </div>

                {{-- Description --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Job Description</label>
                    <textarea name="description" rows="4" required
                              class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100">{{ $job->description }}</textarea>
                </div>

                {{-- Type --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Job Type</label>
                    <select name="type" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100">
                        <option value="full-time" {{ $job->type == 'full-time' ? 'selected' : '' }}>Full-time</option>
                        <option value="part-time" {{ $job->type == 'part-time' ? 'selected' : '' }}>Part-time</option>
                        <option value="remote" {{ $job->type == 'remote' ? 'selected' : '' }}>Remote</option>
                    </select>
                </div>

                {{-- Category --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select name="category_id" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $job->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- City --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">City</label>
                    <input type="text" name="city" value="{{ $job->city }}" required
                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100">
                </div>

                {{-- Salary Range --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Salary Range</label>
                    <input type="text" name="salary_range" value="{{ $job->salary_range }}" required
                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100">
                </div>

                {{-- Status --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100">
                        <option value="active" {{ $job->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="closed" {{ $job->status == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>

                {{-- Deadline --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Application Deadline</label>
                    <input type="date" name="deadline" value="{{ $job->deadline }}" required
                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 text-gray-100">
                </div>

                {{-- Submit --}}
                <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
                    Update Job →
                </button>

            </form>

        </div>
    </div>
@endsection
