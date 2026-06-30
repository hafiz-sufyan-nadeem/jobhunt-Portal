@extends('layout.app')

@section('title', 'My Applications')

@section('nav-links')
    @auth()
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

    <div class="max-w-6xl mx-auto px-4 py-10">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-100">
                My Applications
            </h1>
            <p class="text-gray-400 mt-2">
                Track all jobs you have applied for.
            </p>
        </div>

        @if($applications->count())

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

                @foreach($applications as $application)

                    <div class="bg-gray-900 border border-gray-800 border-l-4 border-l-indigo-600 rounded-xl p-5 hover:-translate-y-1 hover:border-indigo-500 transition-all duration-200">

                        <p class="text-sm text-gray-400 mb-2">
                            {{ $application->job->employer->company_name }}
                        </p>

                        <h3 class="text-lg font-bold text-white mb-3">
                            {{ $application->job->title }}
                        </h3>

                        <div class="flex flex-wrap gap-2 mb-4">

                        <span class="px-3 py-1 text-xs rounded-full bg-indigo-950 text-indigo-300 border border-indigo-800">
                            {{ ucfirst($application->status) }}
                        </span>

                            <span class="px-3 py-1 text-xs rounded-full bg-gray-800 text-gray-300 border border-gray-700">
                            {{ $application->created_at->format('d M Y') }}
                        </span>

                        </div>

                        <p class="text-sm text-gray-500">
                            Applied on {{ $application->created_at->diffForHumans() }}
                        </p>

                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-10 text-center">
                <div class="text-5xl mb-4">📄</div>
                <h3 class="text-xl font-semibold text-white mb-2">
                    No Applications Found
                </h3>

                <p class="text-gray-400">
                    You haven't applied for any jobs yet.
                </p>

            </div>
        @endif
    </div>
@endsection
