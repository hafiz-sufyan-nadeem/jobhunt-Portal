@extends('layout.app')

@section('title', 'My Applications')

@section('nav-links')
    @auth
        <span class="text-gray-600 text-sm hidden md:block">Hi, {{ auth()->user()->name }}</span>
        <a href="{{ route('candidate.index') }}" class="px-4 py-2 border border-blue-500 text-white hover:bg-blue-500 rounded-lg text-sm">My Profile</a>
        <a href="{{ route('applications.index') }}" class="px-4 py-2 border border-blue-500 text-white hover:bg-blue-500 rounded-lg text-sm">My Applications</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg text-sm">Logout</button>
        </form>
    @endauth
@endsection

@section('content')
    <div class="max-w-6xl mx-auto px-4 pt-24 pb-12">

        <h2 class="text-2xl font-bold text-gray-100 mb-6">My Applications</h2>

        @if($applications->isEmpty())
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-12 text-center">
                <p class="text-5xl mb-4">📄</p>
                <p class="text-gray-500">You haven't applied to any jobs yet.</p>
                <a href="{{ route('home') }}" class="mt-4 inline-block px-6 py-2.5 bg-indigo-600 text-white rounded-lg text-sm hover:bg-indigo-700 transition">
                    Browse Jobs
                </a>
            </div>
        @else
            <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-800">
                    <tr>
                        <th class="text-left text-xs font-medium text-gray-400 uppercase px-4 py-3">Job Title</th>
                        <th class="text-left text-xs font-medium text-gray-400 uppercase px-4 py-3">Company</th>
                        <th class="text-left text-xs font-medium text-gray-400 uppercase px-4 py-3">Status</th>
                        <th class="text-left text-xs font-medium text-gray-400 uppercase px-4 py-3">Applied</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($applications as $application)
                        <tr class="border-t border-gray-800">
                            <td class="px-4 py-3 text-sm text-gray-200">{{ $application->job->title }}</td>
                            <td class="px-4 py-3 text-sm text-gray-400">{{ $application->job->employer->company_name }}</td>
                            <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                @if($application->status == 'pending') bg-gray-700 text-gray-300
                                @elseif($application->status == 'reviewed') bg-blue-950 text-blue-400
                                @elseif($application->status == 'shortlisted') bg-yellow-950 text-yellow-400
                                @elseif($application->status == 'hired') bg-green-950 text-green-400
                                @else bg-red-950 text-red-400
                                @endif">
                                {{ ucfirst($application->status) }}
                            </span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500">{{ $application->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    </div>
@endsection
