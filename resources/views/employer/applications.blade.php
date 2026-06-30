@extends('layout.app')

@section('title', 'Applications')
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

        <h2 class="text-2xl font-bold text-gray-100 mb-6">Applications</h2>

        @if($applications->isEmpty())
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-12 text-center">
                <p class="text-gray-500">No applications received yet.</p>
            </div>
        @else
            <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-800">
                    <tr>
                        <th class="text-left text-xs font-medium text-gray-400 uppercase px-4 py-3">Candidate</th>
                        <th class="text-left text-xs font-medium text-gray-400 uppercase px-4 py-3">Job Title</th>
                        <th class="text-left text-xs font-medium text-gray-400 uppercase px-4 py-3">Status</th>
                        <th class="text-left text-xs font-medium text-gray-400 uppercase px-4 py-3">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($applications as $application)
                        <tr class="border-t border-gray-800">
                            <td class="px-4 py-3 text-sm text-gray-200">{{ $application->candidate->user->name }}</td>
                            <td class="px-4 py-3 text-sm text-gray-400">{{ $application->job->title }}</td>
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
                            <td class="px-4 py-3 text-sm">
                                <div class="flex flex-wrap gap-1.5">
                                    <form action="{{ route('employer.application.status', $application->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="reviewed">
                                        <button type="submit" class="px-2.5 py-1 bg-blue-950 text-blue-400 rounded text-xs hover:bg-blue-900 transition">Reviewed</button>
                                    </form>

                                    <form action="{{ route('employer.application.status', $application->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="shortlisted">
                                        <button type="submit" class="px-2.5 py-1 bg-yellow-950 text-yellow-400 rounded text-xs hover:bg-yellow-900 transition">Shortlist</button>
                                    </form>

                                    <form action="{{ route('employer.application.status', $application->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="hired">
                                        <button type="submit" class="px-2.5 py-1 bg-green-950 text-green-400 rounded text-xs hover:bg-green-900 transition">Hire</button>
                                    </form>

                                    <form action="{{ route('employer.application.status', $application->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="px-2.5 py-1 bg-red-950 text-red-400 rounded text-xs hover:bg-red-900 transition">Reject</button>
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
