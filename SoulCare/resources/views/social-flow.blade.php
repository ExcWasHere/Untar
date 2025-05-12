@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 w-64 bg-purple-300 shadow-lg">
        <div class="flex items-center justify-center h-16 border-b border-purple-400">
            <h2 class="text-2xl font-bold text-purple-900">SoulCare</h2>
        </div>
        <nav class="mt-6">
            <div class="px-4 space-y-2">
                <a href="/dashboard" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                </a>
                <a href="/emotions" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Emotion Log</span>
                </a>
                <a href="/social-flow" class="flex items-center px-4 py-3 text-purple-900 bg-white rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span>Social Flow</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    <span>Consultation</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span>Release your emotion</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>Hope Scan</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-64 px-8 py-6">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-purple-900">Social Flow</h1>
                <p class="text-purple-700">Pantau dan catat interaksi sosialmu</p>
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

        <!-- Content Sections -->
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
            <!-- Form Input -->
            <div class="p-6 bg-purple-300 rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-purple-900">Catat Interaksi Sosial Hari Ini</h3>
                </div>
                <form id="socialForm">
                    <div class="mb-5">
                        <label class="block text-lg text-purple-800 font-medium mb-2" for="interactionCount">
                            Jumlah Interaksi Sosial
                        </label>
                        <input type="number" min="0" id="interactionCount" name="count" 
                            class="w-full px-5 py-3 border border-purple-300 rounded-lg shadow-inner focus:outline-none focus:ring-2 focus:ring-purple-500" 
                            placeholder="Masukkan jumlah, contoh: 5">
                    </div>
                    <button type="submit" 
                        class="px-4 py-2 text-white bg-purple-500 rounded-lg hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-400 w-full">
                        Simpan Data
                    </button>
                </form>
            </div>

            <!-- Analysis Output -->
            <div class="p-6 bg-pink-300 rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-purple-900">Analisis Interaksi Sosial</h3>
                </div>
                <div id="analysisResult" class="text-center text-xl text-purple-800 flex-grow flex items-center justify-center h-48">
                    <p class="text-purple-700 italic">Belum ada data yang dimasukkan.</p>
                </div>
                <div class="mt-6 text-sm text-purple-700 text-center">
                    Analisis berdasarkan jumlah interaksi harianmu
                </div>
            </div>
        </div>

        <!-- History Section (Optional) -->
        <div class="mt-8 p-6 bg-yellow-200 rounded-lg shadow-md">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-medium text-purple-900">Riwayat Interaksi Sosial</h3>
                <button class="px-3 py-1 text-sm text-purple-800 bg-white rounded-lg hover:bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-purple-400">
                    Lihat Semua
                </button>
            </div>
            <div class="space-y-4" id="interactionHistory">
                <div class="p-4 border border-white rounded-lg hover:bg-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="font-medium text-purple-800">11 Mei 2025</h4>
                            <p class="text-sm text-purple-700">6 interaksi</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                                Ambivert
                            </span>
                        </div>
                    </div>
                </div>
                <div class="p-4 border border-white rounded-lg hover:bg-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="font-medium text-purple-800">10 Mei 2025</h4>
                            <p class="text-sm text-purple-700">9 interaksi</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                Extrovert
                            </span>
                        </div>
                    </div>
                </div>
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

<script>
    document.getElementById('socialForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const count = parseInt(document.getElementById('interactionCount').value);
        const resultDiv = document.getElementById('analysisResult');

        let result = '';
        if (isNaN(count) || count < 0) {
            result = '<p class="text-red-500 text-lg">Masukkan jumlah interaksi yang valid.</p>';
        } else if (count >= 8) {
            result = `
                <div>
                    <p class="text-green-600 font-bold text-2xl mb-2">Extrovert ✨</p>
                    <p class="text-purple-800">Tingkat interaksimu sangat tinggi. Kamu tampaknya menikmati kebersamaan dengan orang lain!</p>
                </div>
            `;
        } else if (count >= 4) {
            result = `
                <div>
                    <p class="text-yellow-600 font-bold text-2xl mb-2">Ambivert ⚖️</p>
                    <p class="text-purple-800">Kamu memiliki keseimbangan dalam berinteraksi, bisa nyaman sendiri maupun bersama orang lain.</p>
                </div>
            `;
        } else {
            result = `
                <div>
                    <p class="text-purple-600 font-bold text-2xl mb-2">Introvert 🌙</p>
                    <p class="text-purple-800">Kamu lebih nyaman dengan waktu sendiri. Itu tidak masalah, tetap jaga koneksi sosial sesuai kenyamananmu.</p>
                </div>
            `;
        }

        resultDiv.innerHTML = result;
        
        // Add to history (in a real app, this would save to a database)
        const today = new Date();
        const dateStr = today.getDate() + ' ' + ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'][today.getMonth()] + ' ' + today.getFullYear();
        const typeClass = count >= 8 ? 'bg-green-100 text-green-800' : count >= 4 ? 'bg-yellow-100 text-yellow-800' : 'bg-purple-100 text-purple-800';
        const typeText = count >= 8 ? 'Extrovert' : count >= 4 ? 'Ambivert' : 'Introvert';
        
        const historyDiv = document.getElementById('interactionHistory');
        const newEntry = document.createElement('div');
        newEntry.className = 'p-4 border border-white rounded-lg hover:bg-white';
        newEntry.innerHTML = `
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="font-medium text-purple-800">${dateStr}</h4>
                    <p class="text-sm text-purple-700">${count} interaksi</p>
                </div>
                <div class="text-right">
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium ${typeClass}">
                        ${typeText}
                    </span>
                </div>
            </div>
        `;
        
        // Insert at top
        historyDiv.insertBefore(newEntry, historyDiv.firstChild);
    });
</script>
@endsection