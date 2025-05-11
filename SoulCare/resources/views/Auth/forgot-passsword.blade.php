@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-bold text-gray-800">Reset Password</h2>
            <p class="text-sm text-gray-500 mt-1">Masukkan email Anda untuk mereset password</p>
        </div>

        @if(session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror" required autofocus>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Kirim Link Reset Password</button>
            </div>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">Kembali ke halaman login</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection