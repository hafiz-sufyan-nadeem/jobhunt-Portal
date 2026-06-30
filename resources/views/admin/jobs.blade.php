@extends('layout.app')

@section('title', 'Manage Jobs')

@section('nav-links')
    @auth
        <span class="text-gray-600 text-sm hidden md:block">Hi, {{ auth()->user()->name }}</span>
        <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 border border-gray-600 text-white hover:bg-gray-800 rounded-lg text-sm">Dashboard</a>
        <a href="{{ route('admin.jobs') }}" class="px-4 py-2 border border-indigo-500 text-white hover:bg-indigo-600 rounded-lg text-sm">Jobs</a>
        <a href="{{ route('admin.users') }}" class="px-4 py-2 border border-gray-600 text-white hover:bg-gray-800 rounded-lg text-sm">Users</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg text-sm">Logout</button>
        </form>
    @endauth
@endsection

@section('content')
    <div class="max-w-6xl mx-auto px-4 pt-24 pb-12">

        <h2 class="text-2xl font-bold text-gray-100 mb-6">Manage Jobs</h2>

        @if($jobs->isEmpty())
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-12 text-center">
                <p class="text-gray-500">No jobs found.</p>
            </div>
        @else
            <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-800">
                    <tr>
                        <th class="text-left text-xs font-medium text-gray-400 uppercase px-4 py-3">Job Title</th>
                        <th class="text-left text-xs font-medium text-gray-400 uppercase px-4 py-3">Company</th>
                        <th class="text-left text-xs font-medium text-gray-400 uppercase px-4 py-3">Status</th>
                        <th class="text-left text-xs font-medium text-gray-400 uppercase px-4 py-3">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr class="border-t border-gray-800">
                            <td class="px-4 py-3 text-sm text-gray-200">{{ $job->title }}</td>
                            <td class="px-4 py-3 text-sm text-gray-400">{{ $job->employer->company_name }}</td>
                            <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                {{ $job->status == 'active' ? 'bg-green-950 text-green-400' : 'bg-red-950 text-red-400' }}">
                                {{ ucfirst($job->status) }}
                            </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex gap-2">
                                    <form action="{{ route('admin.jobs.approve', $job->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-3 py-1.5 bg-green-950 text-green-400 rounded text-xs hover:bg-green-900 transition">
                                            Approve
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.jobs.reject', $job->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-3 py-1.5 bg-red-950 text-red-400 rounded text-xs hover:bg-red-900 transition">
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    </div>
@endsection
