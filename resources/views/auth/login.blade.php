{{-- resources/views/login.blade.php --}}
@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container mx-auto mt-10 max-w-md bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>

    {{-- Tampilkan error jika ada --}}
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label for="username" class="block text-gray-700">Username</label>
            <input type="text" name="username" id="username" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring" value="{{ old('email') }}">
            @error('email')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" name="password" id="password" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring">
            @error('password')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded">Login</button>
    </form>
</div>
@endsection
