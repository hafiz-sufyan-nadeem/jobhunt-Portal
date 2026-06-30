@extends('layout.app')

@section('title', 'My Profile')

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
        <h2 class="text-2xl font-bold text-gray-100 mb-6">My Profile</h2>
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">

            <div class="w-16 h-16 bg-indigo-950 rounded-xl flex items-center justify-center text-indigo-400 font-bold text-2xl mb-6">
                {{ strtoupper(substr($candidates->headline, 0, 2)) }}
            </div>

            <h2 class="text-2xl font-bold text-gray-100 mb-1">{{ $candidates->headline }}</h2>
            <p class="text-gray-500 text-sm mb-4">📍 {{ $candidates->city }} &nbsp;|&nbsp; 📞 {{ $candidates->phone }}</p>
            <p class="text-gray-400 mb-6">{{ $candidates->skills }}</p>

            @if($candidates->resume)
                <a href="{{ asset('storage/' . $candidates->resume) }}" target="_blank" class="text-indigo-400 text-sm hover:underline mb-6 inline-block">
                    📄 View Resume
                </a>
            @endif

            <div>
                <a href="{{ route('candidate.edit', $candidates->id) }}" class="px-6 py-2.5 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
                    Edit Profile
                </a>
            </div>

        </div>

    </div>
@endsection
