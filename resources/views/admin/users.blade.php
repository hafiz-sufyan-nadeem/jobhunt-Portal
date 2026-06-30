@extends('layout.app')

@section('title', 'Manage Users')

@section('nav-links')
    @auth
        <span class="text-gray-600 text-sm hidden md:block">Hi, {{ auth()->user()->name }}</span>
        <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 border border-gray-600 text-white hover:bg-gray-800 rounded-lg text-sm">Dashboard</a>
        <a href="{{ route('admin.jobs') }}" class="px-4 py-2 border border-gray-600 text-white hover:bg-gray-800 rounded-lg text-sm">Jobs</a>
        <a href="{{ route('admin.users') }}" class="px-4 py-2 border border-indigo-500 text-white hover:bg-indigo-600 rounded-lg text-sm">Users</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg text-sm">Logout</button>
        </form>
    @endauth
@endsection

@section('content')
    <div class="max-w-6xl mx-auto px-4 pt-24 pb-12">

        <h2 class="text-2xl font-bold text-gray-100 mb-6">Manage Users</h2>

        <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-800">
                <tr>
                    <th class="text-left text-xs font-medium text-gray-400 uppercase px-4 py-3">Name</th>
                    <th class="text-left text-xs font-medium text-gray-400 uppercase px-4 py-3">Email</th>
                    <th class="text-left text-xs font-medium text-gray-400 uppercase px-4 py-3">Role</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="border-t border-gray-800">
                        <td class="px-4 py-3 text-sm text-gray-200">{{ $user->name }}</td>
                        <td class="px-4 py-3 text-sm text-gray-400">{{ $user->email }}</td>
                        <td class="px-4 py-3 text-sm">
                        <span class="px-2 py-1 rounded-full text-xs font-medium
                            @if($user->role == 'admin') bg-indigo-950 text-indigo-400
                            @elseif($user->role == 'employer') bg-yellow-950 text-yellow-400
                            @else bg-blue-950 text-blue-400
                            @endif">
                            {{ ucfirst($user->role) }}
                        </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
