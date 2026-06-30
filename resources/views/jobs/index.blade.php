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
    <div class="max-w-6xl mx-auto px-4 pt-24 pb-12">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">My Jobs</h2>
            <a href="{{ route('jobs.create') }}" class="px-6 py-2.5 bg-blue-600 text-white rounded-lg text-sm font-medium hover:bg-blue-700 transition">
                + Post New Job
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                <tr>
                    <th class="text-left text-xs font-medium text-gray-500 uppercase px-4 py-3">Job Title</th>
                    <th class="text-left text-xs font-medium text-gray-500 uppercase px-4 py-3">Type</th>
                    <th class="text-left text-xs font-medium text-gray-500 uppercase px-4 py-3">City</th>
                    <th class="text-left text-xs font-medium text-gray-500 uppercase px-4 py-3">Salary</th>
                    <th class="text-left text-xs font-medium text-gray-500 uppercase px-4 py-3">Status</th>
                    <th class="text-left text-xs font-medium text-gray-500 uppercase px-4 py-3">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr class="border-t border-gray-100">
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $job->title }}</td>
                        <td class="px-4 py-3 text-sm text-gray-500">{{ $job->type }}</td>
                        <td class="px-4 py-3 text-sm text-gray-500">{{ $job->city }}</td>
                        <td class="px-4 py-3 text-sm text-gray-500">{{ $job->salary_range }}</td>
                        <td class="px-4 py-3 text-sm">
                    <span class="px-2 py-1 rounded-full text-xs font-medium {{ $job->status == 'active' ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' }}">
                        {{ $job->status }}
                    </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ route('jobs.edit', $job->id) }}" class="text-blue-500 hover:underline mr-3">Edit</a>
                            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
