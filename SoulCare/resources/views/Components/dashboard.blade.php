@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-yellow-50">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 w-64 bg-purple-300 shadow-lg">
        <div class="flex items-center justify-center h-16 border-b border-purple-400">
            <h2 class="text-2xl font-bold text-purple-900">SoulCare</h2>
        </div>
        <nav class="mt-6">
            <div class="px-4 space-y-2">
                <a href="#" class="flex items-center px-4 py-3 text-purple-900 bg-yellow-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-yellow-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Emosi Harian</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-yellow-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span>Interaksi Sosial</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-yellow-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    <span>Konsultasi</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-yellow-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span>Curhat AI</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-yellow-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>Asesmen</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-64 px-8 py-6">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-purple-900">Dashboard</h1>
                <p class="text-purple-700">Selamat datang kembali, {{ auth()->user()->name ?? 'Pengguna' }}!</p>
            </div>
            <div class="flex items-center space-x-4">
                <button class="px-4 py-2 text-white bg-purple-500 rounded-lg hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    Notifikasi
                </button>
                <div class="relative">
                    <button class="flex items-center px-3 py-2 text-purple-900 bg-purple-200 rounded-lg hover:bg-purple-300 focus:outline-none focus:ring-2 focus:ring-purple-400">
                        <span class="mr-2">{{ auth()->user()->name ?? 'Pengguna' }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-8 mb-8 md:grid-cols-2 lg:grid-cols-4">
            <div class="p-6 bg-purple-300 rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-purple-900">Status Emosi</h3>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-purple-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                </div>
                <div class="flex items-center">
                    <div class="text-4xl font-bold text-purple-900">7.5</div>
                    <div class="ml-4">
                        <div class="text-sm text-purple-800">Skor Rata-rata</div>
                        <div class="text-sm text-green-600">+2.5 dari minggu lalu</div>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-pink-200 rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-purple-900">Interaksi Sosial</h3>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-pink-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-pink-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </span>
                </div>
                <div class="flex items-center">
                    <div class="text-4xl font-bold text-purple-900">12</div>
                    <div class="ml-4">
                        <div class="text-sm text-purple-800">Mingguan</div>
                        <div class="text-sm text-green-600">+3 dari minggu lalu</div>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-yellow-200 rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-purple-900">Sesi Konsultasi</h3>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-yellow-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                    </span>
                </div>
                <div class="flex items-center">
                    <div class="text-4xl font-bold text-purple-900">2</div>
                    <div class="ml-4">
                        <div class="text-sm text-purple-800">Bulan ini</div>
                        <div class="text-sm text-yellow-700">Jadwal berikutnya: 15 Mei</div>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-yellow-100 rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-purple-900">Sesi Curhat AI</h3>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-yellow-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </span>
                </div>
                <div class="flex items-center">
                    <div class="text-4xl font-bold text-purple-900">8</div>
                    <div class="ml-4">
                        <div class="text-sm text-purple-800">Minggu ini</div>
                        <div class="text-sm text-green-600">+5 dari minggu lalu</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Sections -->
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
            <!-- Mood Graph -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-purple-900">Grafik Emosi 7 Hari Terakhir</h3>
                    <div class="relative">
                        <button class="px-3 py-1 text-sm text-purple-800 bg-purple-100 rounded-lg hover:bg-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400">
                            7 Hari
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="h-64 bg-purple-50 rounded-lg flex items-center justify-center">
                    <!-- Placeholder for chart -->
                    <div class="text-purple-400 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <p class="mt-2">Grafik emosi akan ditampilkan di sini.</p>
                        <p class="text-sm text-purple-300">Data tersedia setelah minimal 3 hari input emosi</p>
                    </div>
                </div>
            </div>

            <!-- Social Interaction Tracker -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-purple-900">Interaksi Sosial Terbaru</h3>
                    <button class="px-3 py-1 text-sm text-pink-800 bg-pink-100 rounded-lg hover:bg-pink-200 focus:outline-none focus:ring-2 focus:ring-pink-400">
                        Tambah Baru
                    </button>
                </div>
                <div class="space-y-4">
                    <div class="p-4 border border-gray-100 rounded-lg hover:bg-pink-50">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="inline-flex items-center justify-center w-10 h-10 mr-3 bg-pink-100 rounded-full">
                                    <span class="text-pink-800 font-medium">KL</span>
                                </div>
                                <div>
                                    <h4 class="font-medium text-purple-900">Keluarga</h4>
                                    <p class="text-sm text-purple-700">Makan malam bersama</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-sm text-purple-700">Kemarin</span>
                                <div class="flex mt-1">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                        Positif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 border border-gray-100 rounded-lg hover:bg-pink-50">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="inline-flex items-center justify-center w-10 h-10 mr-3 bg-pink-100 rounded-full">
                                    <span class="text-pink-800 font-medium">TM</span>
                                </div>
                                <div>
                                    <h4 class="font-medium text-purple-900">Teman</h4>
                                    <p class="text-sm text-purple-700">Diskusi proyek</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-sm text-purple-700">3 hari lalu</span>
                                <div class="flex mt-1">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                                        Netral
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 border border-gray-100 rounded-lg hover:bg-pink-50">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="inline-flex items-center justify-center w-10 h-10 mr-3 bg-pink-100 rounded-full">
                                    <span class="text-pink-800 font-medium">KR</span>
                                </div>
                                <div>
                                    <h4 class="font-medium text-purple-900">Kerja</h4>
                                    <p class="text-sm text-purple-700">Meeting dengan tim</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-sm text-purple-700">5 hari lalu</span>
                                <div class="flex mt-1">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                        Negatif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <a href="#" class="text-sm text-purple-600 hover:text-purple-800">Lihat semua sesi →</a>
                </div>
            </div>
        </div>

        <!-- Risk Assessment & Self-Care Tips -->
        <div class="mt-8 grid grid-cols-1 gap-8 lg:grid-cols-2">
            <!-- Risk Assessment Section -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-purple-900">Asesmen Kesehatan Mental</h3>
                    <div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Terakhir: 3 hari lalu
                        </span>
                    </div>
                </div>
                <div class="p-4 border border-purple-100 rounded-lg bg-purple-50">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 mr-4 bg-purple-200 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-purple-900">Tingkat Risiko</h4>
                            <p class="text-sm text-purple-700">Rendah - Tidak terdeteksi adanya risiko yang signifikan</p>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <span class="w-24 text-sm text-purple-700">Depresi:</span>
                            <div class="flex-1 h-2 ml-2 bg-gray-200 rounded-full">
                                <div class="h-2 bg-green-500 rounded-full" style="width: 15%"></div>
                            </div>
                            <span class="ml-2 text-sm text-purple-700">15%</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-24 text-sm text-purple-700">Kecemasan:</span>
                            <div class="flex-1 h-2 ml-2 bg-gray-200 rounded-full">
                                <div class="h-2 bg-yellow-500 rounded-full" style="width: 35%"></div>
                            </div>
                            <span class="ml-2 text-sm text-purple-700">35%</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-24 text-sm text-purple-700">Stres:</span>
                            <div class="flex-1 h-2 ml-2 bg-gray-200 rounded-full">
                                <div class="h-2 bg-yellow-500 rounded-full" style="width: 40%"></div>
                            </div>
                            <span class="ml-2 text-sm text-purple-700">40%</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="w-full px-4 py-2 text-white bg-purple-500 rounded-lg hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-400">
                            Lakukan Asesmen Baru
                        </button>
                    </div>
                </div>
            </div>

            <!-- Self-Care Tips -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-purple-900">Tips Perawatan Diri</h3>
                    <button class="px-3 py-1 text-sm text-purple-800 bg-purple-100 rounded-lg hover:bg-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Segarkan
                    </button>
                </div>
                <div class="space-y-4">
                    <div class="p-4 bg-pink-50 border border-pink-100 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-pink-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="font-medium text-purple-900">Latihan Pernapasan</h4>
                                <p class="mt-1 text-sm text-purple-700">Luangkan 5 menit untuk latihan pernapasan dalam guna mengurangi tingkat stres Anda.</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 bg-yellow-50 border border-yellow-100 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="font-medium text-purple-900">Tidur Berkualitas</h4>
                                <p class="mt-1 text-sm text-purple-700">Cobalah untuk tidur dan bangun pada waktu yang sama setiap hari untuk memperbaiki pola tidur Anda.</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 bg-purple-50 border border-purple-100 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="font-medium text-purple-900">Hubungi Teman</h4>
                                <p class="mt-1 text-sm text-purple-700">Komunikasi dengan orang terdekat bisa meningkatkan suasana hati. Cobalah menghubungi teman atau keluarga hari ini.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <a href="#" class="text-sm text-purple-600 hover:text-purple-800">Lihat semua tips →</a>
                </div>
            </div>
        </div>

        <!-- Emergency Contact Section -->
        <div class="mt-8 p-6 bg-red-50 border border-red-100 rounded-lg shadow-md">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-red-900">Kontak Darurat</h3>
                <button class="px-3 py-1 text-sm text-red-800 bg-red-100 rounded-lg hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-red-400">
                    Edit Kontak
                </button>
            </div>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                <div class="p-4 bg-white rounded-lg border border-red-100">
                    <div class="flex items-center">
                        <div class="inline-flex items-center justify-center w-10 h-10 mr-3 bg-red-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-red-900">Hotline Nasional</h4>
                            <p class="text-sm text-red-700">119 - Ext 8</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 bg-white rounded-lg border border-red-100">
                    <div class="flex items-center">
                        <div class="inline-flex items-center justify-center w-10 h-10 mr-3 bg-red-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-red-900">Keluarga</h4>
                            <p class="text-sm text-red-700">Ibu - 0812-3456-7890</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 bg-white rounded-lg border border-red-100">
                    <div class="flex items-center">
                        <div class="inline-flex items-center justify-center w-10 h-10 mr-3 bg-red-100 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 3l-6 6m0 0V4m0 5h5M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-red-900">Psikolog</h4>
                            <p class="text-sm text-red-700">Dr. Anisa - 0877-8899-0011</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 text-sm text-red-700 text-center">
                <p>Jika Anda dalam kondisi darurat, segera hubungi 119 atau kunjungi unit gawat darurat terdekat.</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 pt-6 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <div class="text-sm text-purple-700">
                    &copy; 2025 SoulCare. Hak Cipta Dilindungi.
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-sm text-purple-700 hover:text-purple-900">Kebijakan Privasi</a>
                    <a href="#" class="text-sm text-purple-700 hover:text-purple-900">Syarat dan Ketentuan</a>
                    <a href="#" class="text-sm text-purple-700 hover:text-purple-900">Bantuan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection semua interaksi →</a>
                </div>
            </div>

            <!-- Upcoming Consultations -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-purple-900">Konsultasi Mendatang</h3>
                    <button class="px-3 py-1 text-sm text-yellow-800 bg-yellow-100 rounded-lg hover:bg-yellow-200 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        Jadwalkan
                    </button>
                </div>
                <div class="p-4 border border-yellow-100 bg-yellow-50 rounded-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 mr-4">
                            <div class="inline-flex items-center justify-center w-12 h-12 bg-yellow-200 rounded-lg">
                                <span class="text-yellow-800 text-xl font-bold">15</span>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <h4 class="font-medium text-purple-900">Dr. Anisa Wijaya, M.Psi</h4>
                            <div class="flex items-center text-sm text-purple-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>15 Mei, 14:00 - 15:00 WIB</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0 ml-4">
                            <button class="px-3 py-1 text-sm text-yellow-800 bg-yellow-200 rounded-lg hover:bg-yellow-300">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <h4 class="mb-3 font-medium text-purple-900">Psikolog Rekomendasi</h4>
                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                        <div class="flex items-center p-3 border border-gray-100 rounded-lg hover:bg-yellow-50">
                            <div class="flex-shrink-0 mr-3">
                                <div class="w-10 h-10 bg-yellow-200 rounded-full"></div>
                            </div>
                            <div>
                                <h5 class="font-medium text-purple-900">Dr. Budi Santoso</h5>
                                <p class="text-sm text-purple-700">Spesialis Kecemasan</p>
                            </div>
                        </div>
                        <div class="flex items-center p-3 border border-gray-100 rounded-lg hover:bg-yellow-50">
                            <div class="flex-shrink-0 mr-3">
                                <div class="w-10 h-10 bg-yellow-200 rounded-full"></div>
                            </div>
                            <div>
                                <h5 class="font-medium text-purple-900">Dra. Maya Putri</h5>
                                <p class="text-sm text-purple-700">Spesialis Depresi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- AI Chat Center -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-purple-900">Curhat dengan AI</h3>
                    <button class="px-3 py-1 text-sm text-purple-800 bg-purple-100 rounded-lg hover:bg-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400">
                        Mulai Sesi Baru
                    </button>
                </div>
                <div class="p-4 mb-6 bg-yellow-50 rounded-lg border border-yellow-100">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-10 h-10 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h4 class="mt-2 font-medium text-purple-900">Pengingat Penting</h4>
                        <p class="mt-1 text-sm text-purple-700">AI assistant tidak menggantikan konsultasi dengan psikolog profesional. Untuk kondisi serius, segera hubungi psikolog atau hotline bantuan.</p>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="p-3 border border-gray-100 rounded-lg hover:bg-purple-50">
                        <div class="flex justify-between">
                            <h4 class="font-medium text-purple-900">Sesi #8</h4>
                            <span class="text-sm text-purple-700">Hari ini, 09:45</span>
                        </div>
                        <p class="mt-1 text-sm text-purple-700 line-clamp-1">Diskusi tentang cara mengatasi kecemasan saat presentasi...</p>
                    </div>
                    <div class="p-3 border border-gray-100 rounded-lg hover:bg-purple-50">
                        <div class="flex justify-between">
                            <h4 class="font-medium text-purple-900">Sesi #7</h4>
                            <span class="text-sm text-purple-700">Kemarin, 21:30</span>
                        </div>
                        <p class="mt-1 text-sm text-purple-700 line-clamp-1">Membahas tantangan komunikasi dalam hubungan...</p>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <a href="#" class="text-sm text-purple-600 hover:text-purple-800">Lihat