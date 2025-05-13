@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-200 to-pink-100">
    <div class="w-full max-w-4xl mx-auto grid grid-cols-1 lg:grid-cols-2 rounded-xl overflow-hidden shadow-xl">
        <!-- Left panel - Form -->
        <div class="bg-white p-10">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-purple-900">SoulCare</h2>
                <p class="text-purple-700 mt-2">Daftar untuk memulai perjalanan kesehatan mental Anda.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                
                <div>
                    <label for="name" class="block text-sm font-medium text-purple-800">Nama Lengkap</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus 
                        class="mt-1 w-full px-4 py-3 border border-purple-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                    @error('name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-purple-800">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required 
                        class="mt-1 w-full px-4 py-3 border border-purple-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                    @error('email')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-purple-800">Password</label>
                    <input id="password" type="password" name="password" required 
                        class="mt-1 w-full px-4 py-3 border border-purple-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                    @error('password')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password-confirm" class="block text-sm font-medium text-purple-800">Konfirmasi Password</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required 
                        class="mt-1 w-full px-4 py-3 border border-purple-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full px-6 py-3 text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                        Daftar
                    </button>
                </div>

                <div class="text-center">
                    <p class="text-sm text-purple-700">
                        Sudah memiliki akun? 
                        <a href="{{ route('login') }}" class="font-medium text-purple-600 hover:text-purple-800">Masuk</a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Right panel - Illustration -->
        <div class="hidden lg:block bg-gradient-to-br from-purple-300 to-pink-300 p-10 relative overflow-hidden">
            <div class="absolute inset-0 flex items-center justify-center">
                <!-- Decorative elements and illustration -->
                <div class="text-center z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto text-white opacity-90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <h3 class="mt-6 text-2xl font-bold text-white">Mulai Perjalanan Baru</h3>
                    <p class="mt-2 text-white text-opacity-90">Bergabunglah dengan komunitas SoulCare</p>
                </div>
            </div>
            
            <!-- Decorative circles -->
            <div class="absolute -bottom-16 -right-16 w-64 h-64 rounded-full bg-pink-200 opacity-50"></div>
            <div class="absolute top-10 -left-10 w-40 h-40 rounded-full bg-purple-200 opacity-50"></div>
            <div class="absolute top-1/2 right-10 w-20 h-20 rounded-full bg-yellow-200 opacity-50"></div>
        </div>
    </div>
</div>
@endsection