@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-100 via-pink-50 to-white flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-5xl mx-auto rounded-2xl overflow-hidden shadow-2xl bg-white transform transition-all hover:shadow-3xl">
        <!-- Welcome Header with animated gradient -->
        <div class="relative bg-gradient-to-r from-purple-600 to-pink-500 py-8 px-8 overflow-hidden">
            <!-- Animated circles in background -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
                <div class="absolute w-32 h-32 rounded-full bg-white opacity-10 -top-10 -left-10 animate-pulse"></div>
                <div class="absolute w-24 h-24 rounded-full bg-pink-300 opacity-20 top-20 right-10 animate-bounce" style="animation-duration: 5s;"></div>
                <div class="absolute w-16 h-16 rounded-full bg-yellow-200 opacity-20 bottom-5 left-1/2 animate-pulse" style="animation-duration: 4s;"></div>
            </div>
            
            <!-- Header content -->
            <div class="relative z-10">
                <h2 class="text-4xl font-bold text-white tracking-tight">Selamat Datang di SoulCare</h2>
                <p class="text-white text-opacity-90 mt-3 text-lg">Platform kesehatan mental yang berfokus pada perjalanan emosional Anda</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-0">
            <!-- Left Content - 3 columns on large screens -->
            <div class="lg:col-span-3 p-10 lg:p-12">
                <div class="space-y-8">
                    <div class="transform transition hover:scale-105 duration-300">
                        <h3 class="text-3xl font-bold text-purple-900 flex items-center">
                            <span class="bg-gradient-to-r from-purple-500 to-pink-500 bg-clip-text text-transparent">Mari Mulai</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 ml-3 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </h3>
                        <p class="text-purple-700 mt-3 text-lg">SoulCare memiliki ekosistem yang komprehensif untuk mendukung kesehatan mental Anda. Mulailah perjalanan dengan:</p>
                    </div>

                    <div class="space-y-6">
                        <!-- Feature 1 -->
                        <div class="flex items-start group transform transition hover:translate-x-2 duration-300">
                            <div class="flex-shrink-0 mt-1">
                                <div class="h-8 w-8 rounded-full bg-gradient-to-br from-purple-500 to-pink-400 shadow-md flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5">
                                <h4 class="text-xl font-semibold text-purple-900 group-hover:text-purple-700">Profil Personal</h4>
                                <p class="mt-1 text-gray-600">Lengkapi profil Anda untuk mendapatkan pengalaman yang dipersonalisasi sesuai kebutuhan Anda</p>
                            </div>
                        </div>
                        
                        <!-- Feature 2 -->
                        <div class="flex items-start group transform transition hover:translate-x-2 duration-300">
                            <div class="flex-shrink-0 mt-1">
                                <div class="h-8 w-8 rounded-full bg-gradient-to-br from-pink-500 to-purple-400 shadow-md flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5">
                                <h4 class="text-xl font-semibold text-purple-900 group-hover:text-purple-700">Log Emosi</h4>
                                <p class="mt-1 text-gray-600">Catat emosi harian Anda untuk memahami pola perasaan dan mengidentifikasi trigger Anda</p>
                            </div>
                        </div>
                        
                        <!-- Feature 3 -->
                        <div class="flex items-start group transform transition hover:translate-x-2 duration-300">
                            <div class="flex-shrink-0 mt-1">
                                <div class="h-8 w-8 rounded-full bg-gradient-to-br from-yellow-400 to-pink-400 shadow-md flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-5">
                                <h4 class="text-xl font-semibold text-purple-900 group-hover:text-purple-700">Curhat AI</h4>
                                <p class="mt-1 text-gray-600">Eksplorasi fitur curhat dengan AI untuk mendapatkan dukungan emosional 24/7</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-4 text-lg text-center text-white bg-gradient-to-r from-purple-600 to-purple-700 rounded-xl hover:from-purple-700 hover:to-purple-800 transform transition-all hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-4 text-lg text-center text-purple-700 bg-purple-100 rounded-xl border-2 border-purple-200 hover:bg-purple-200 transform transition-all hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Content - Illustration (2 columns) -->
            <div class="relative lg:col-span-2 bg-gradient-to-br from-purple-50 to-pink-100 p-10 hidden lg:block">
                <!-- Main circular illustration -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="relative w-full h-full max-w-md max-h-md">
                        <!-- Inner circles - positioned absolutely -->
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 rounded-full border-4 border-purple-200 opacity-60"></div>
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-48 h-48 rounded-full border-4 border-pink-200 opacity-60"></div>
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-32 h-32 rounded-full border-4 border-yellow-200 opacity-60"></div>
                        
                        <!-- Floating emotions -->
                        <div class="absolute top-10 left-10 transform rotate-12 animate-bounce" style="animation-duration: 5s;">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-green-400 to-green-300 shadow-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        
                        <div class="absolute bottom-20 right-10 transform -rotate-12 animate-pulse" style="animation-duration: 4s;">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-pink-400 to-pink-300 shadow-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                        </div>
                        
                        <div class="absolute top-32 right-6 transform rotate-45 animate-bounce" style="animation-duration: 6s;">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-yellow-400 to-yellow-300 shadow-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Text overlay on the illustration -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center z-10 bg-white bg-opacity-75 rounded-xl shadow-xl px-6 py-8 transform transition-all hover:scale-105 duration-300">
                        <div class="mx-auto w-16 h-16 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-purple-900">Perjalanan Kesehatan Mental</h3>
                        <p class="mt-2 text-purple-700 text-sm">Mulai langkah pertama Anda bersama SoulCare dan temukan kedamaian dan kebahagiaan dalam hidup</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer with wave effect -->
        <div class="relative">
            <!-- Wave separator -->
            <div class="absolute top-0 left-0 w-full overflow-hidden leading-none transform translate-y-0 md:-translate-y-1/2 z-10">
                <svg class="relative block w-full h-12 md:h-24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#f3e8ff" opacity="0.9"></path>
                </svg>
            </div>
            
            <div class="px-8 py-8 bg-gradient-to-r from-purple-200 to-pink-100">
                <div class="max-w-4xl mx-auto">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <div class="mb-4 md:mb-0">
                            <h4 class="text-xl font-bold text-purple-900">SoulCare</h4>
                            <p class="text-sm text-purple-700 mt-1">Peduli dengan kesehatan mental Anda.</p>
                        </div>
                        <div class="flex items-center space-x-6">
                            <a href="#" class="text-purple-700 hover:text-purple-900 transform transition hover:scale-110">
                                <!-- Facebook icon -->
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-purple-700 hover:text-purple-900 transform transition hover:scale-110">
                                <!-- Instagram icon -->
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-purple-700 hover:text-purple-900 transform transition hover:scale-110">
                                <!-- Twitter icon -->
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="mt-6 border-t border-purple-300 pt-4">
                        <div class="text-sm text-purple-700 text-center">
                            &copy; 2025 SoulCare. Hak Cipta Dilindungi. <a href="#" class="hover:text-purple-900">Kebijakan Privasi</a> | <a href="#" class="hover:text-purple-900">Syarat dan Ketentuan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes floating {
  0% { transform: translateY(0px); }
  50% { transform: translateY(-15px); }
  100% { transform: translateY(0px); }
}

.animate-floating {
  animation: floating 4s ease-in-out infinite;
}
</style>

@endsection