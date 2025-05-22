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
                <a href="/emotions" class="flex items-center px-4 py-3 text-purple-900 bg-white rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Emotion Log</span>
                </a>
                <a href="/social-flow" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span>Social Flow</span>
                </a>
                <a href="/consultation" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    <span>Consultation</span>
                </a>
                <a href="/release_emotion" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span>Release your emotion</span>
                </a>
                <a href="/hope_scan" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-white">
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
                <h1 class="text-3xl font-bold text-purple-900">Emotion Log</h1>
                <p class="text-purple-700">Pantau dan catat perasaanmu setiap hari</p>
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
            <!-- Emotion Garden & Input -->
            <div class="p-6 bg-purple-300 rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-purple-900">Taman Emosi Anda</h3>
                </div>
                
                <!-- 3D Flower -->
                <div class="flex justify-center mb-8">
                    <div id="flower-container" class="relative w-64 h-80 perspective-1000 transform-gpu">
                        <!-- Pot Bunga with 3D effect -->
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-32 h-16 bg-amber-700 rounded-t-lg rounded-b-xl shadow-lg z-10">
                            <div class="absolute top-0 left-0 w-full h-full bg-amber-800 opacity-30 rounded-t-lg rounded-b-xl transform skew-x-12 translate-x-3 scale-95"></div>
                        </div>
                        <div class="absolute bottom-16 left-1/2 transform -translate-x-1/2 w-40 h-6 bg-amber-800 rounded-t-3xl z-20 shadow-md"></div>
                        
                        <!-- Tanah with 3D texture -->
                        <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 w-28 h-10 bg-amber-900 rounded-t-full z-30">
                            <div class="absolute inset-0 bg-gradient-to-br from-amber-800 to-amber-950 opacity-50 rounded-t-full"></div>
                            <div class="absolute w-20 h-2 bg-amber-700 rounded-full bottom-2 left-4 opacity-40"></div>
                            <div class="absolute w-8 h-1 bg-amber-700 rounded-full bottom-5 left-10 opacity-30"></div>
                        </div>
                        
                        <!-- Batang Bunga with 3D effect -->
                        <div id="stem" class="absolute bottom-20 left-1/2 transform -translate-x-1/2 w-3 h-32 bg-green-500 transition-all duration-700 ease-in-out z-20">
                            <!-- Stem highlight for 3D effect -->
                            <div class="absolute top-0 left-0 w-1 h-full bg-white opacity-20 rounded-l-full"></div>
                        </div>
                        
                        <!-- Daun Kiri with 3D effect -->
                        <div id="leaf-left" class="absolute bottom-40 left-1/2 transform -translate-x-12 w-12 h-8 bg-green-300 opacity-90 rounded-full skew-x-12 transition-all duration-700 z-10 shadow-sm">
                            <!-- Leaf vein -->
                            <div class="absolute top-1/2 left-0 w-full h-px bg-green-800 opacity-20 transform -rotate-12"></div>
                            <div class="absolute top-0 left-0 w-full h-full bg-white opacity-10 rounded-full transform scale-90"></div>
                        </div>
                        
                        <!-- Daun Kanan with 3D effect -->
                        <div id="leaf-right" class="absolute bottom-48 left-1/2 transform translate-x-4 w-12 h-8 bg-green-300 opacity-90 rounded-full -skew-x-12 transition-all duration-700 z-30 shadow-sm">
                            <!-- Leaf vein -->
                            <div class="absolute top-1/2 left-0 w-full h-px bg-green-800 opacity-20 transform rotate-12"></div>
                            <div class="absolute top-0 left-0 w-full h-full bg-white opacity-10 rounded-full transform scale-90"></div>
                        </div>
                        
                        <!-- Bunga with 3D petals -->
                        <div id="flower" class="absolute top-6 left-1/2 transform -translate-x-1/2 transition-all duration-700 scale-100 z-40">
                            <!-- Kelopak Bunga with 3D effect -->
                            <div id="petal-1" class="flower-petal absolute w-16 h-16 bg-pink-300 opacity-90 rounded-full transform -translate-x-8 -translate-y-8 transition-all duration-700 shadow-md rotate-12">
                                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-white to-transparent opacity-30 rounded-full"></div>
                            </div>
                            <div id="petal-2" class="flower-petal absolute w-16 h-16 bg-pink-300 opacity-90 rounded-full transform translate-x-8 -translate-y-8 transition-all duration-700 shadow-md -rotate-12">
                                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-white to-transparent opacity-30 rounded-full"></div>
                            </div>
                            <div id="petal-3" class="flower-petal absolute w-16 h-16 bg-pink-300 opacity-90 rounded-full transform -translate-x-8 translate-y-8 transition-all duration-700 shadow-md -rotate-12">
                                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-white to-transparent opacity-30 rounded-full"></div>
                            </div>
                            <div id="petal-4" class="flower-petal absolute w-16 h-16 bg-pink-300 opacity-90 rounded-full transform translate-x-8 translate-y-8 transition-all duration-700 shadow-md rotate-12">
                                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-white to-transparent opacity-30 rounded-full"></div>
                            </div>
                            
                            <!-- Pusat Bunga with 3D effect -->
                            <div id="flower-center" class="absolute w-10 h-10 bg-yellow-200 rounded-full transform -translate-x-5 -translate-y-5 z-50 shadow-inner">
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-6 h-6 bg-yellow-500 rounded-full opacity-60"></div>
                                <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-yellow-100 rounded-full opacity-80"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Emotion Selection Form -->
                <form id="emotionForm">
                    <div class="mb-5">
                        <label class="block text-lg text-purple-800 font-medium mb-3">Bagaimana perasaan Anda hari ini?</label>
                        <div class="grid grid-cols-3 gap-3">
                            <button type="button" onclick="selectEmotion('sangat-baik')" class="emotion-btn flex flex-col items-center justify-center p-3 bg-green-100 rounded-lg hover:bg-green-200 transform transition-all duration-300">
                                <span class="text-2xl">😄</span>
                                <span class="text-sm font-medium text-green-700 mt-1">Sangat Baik</span>
                            </button>
                            
                            <button type="button" onclick="selectEmotion('baik')" class="emotion-btn flex flex-col items-center justify-center p-3 bg-green-50 rounded-lg hover:bg-green-200 transform transition-all duration-300">
                                <span class="text-2xl">🙂</span>
                                <span class="text-sm font-medium text-green-600 mt-1">Baik</span>
                            </button>
                            
                            <button type="button" onclick="selectEmotion('biasa')" class="emotion-btn flex flex-col items-center justify-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transform transition-all duration-300">
                                <span class="text-2xl">😐</span>
                                <span class="text-sm font-medium text-blue-600 mt-1">Biasa</span>
                            </button>
                            
                            <button type="button" onclick="selectEmotion('sedih')" class="emotion-btn flex flex-col items-center justify-center p-3 bg-yellow-50 rounded-lg hover:bg-yellow-100 transform transition-all duration-300">
                                <span class="text-2xl">😔</span>
                                <span class="text-sm font-medium text-yellow-600 mt-1">Sedih</span>
                            </button>
                            
                            <button type="button" onclick="selectEmotion('cemas')" class="emotion-btn flex flex-col items-center justify-center p-3 bg-orange-50 rounded-lg hover:bg-orange-100 transform transition-all duration-300">
                                <span class="text-2xl">😰</span>
                                <span class="text-sm font-medium text-orange-600 mt-1">Cemas</span>
                            </button>
                            
                            <button type="button" onclick="selectEmotion('marah')" class="emotion-btn flex flex-col items-center justify-center p-3 bg-red-50 rounded-lg hover:bg-red-100 transform transition-all duration-300">
                                <span class="text-2xl">😡</span>
                                <span class="text-sm font-medium text-red-600 mt-1">Marah</span>
                            </button>
                        </div>
                    </div>
                    
                    <div class="mb-5">
                        <label for="note" class="block text-lg text-purple-800 font-medium mb-2">Catatan (opsional)</label>
                        <textarea id="note" name="note" 
                            class="w-full px-5 py-3 border border-purple-300 rounded-lg shadow-inner focus:outline-none focus:ring-2 focus:ring-purple-500" 
                            rows="2" 
                            placeholder="Tambahkan catatan tentang perasaan Anda..."></textarea>
                    </div>
                    
                    <button type="submit" 
                        class="px-4 py-2 text-white bg-purple-500 rounded-lg hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-400 w-full disabled:opacity-50" 
                        disabled>
                        Simpan Emosi Hari Ini
                    </button>
                </form>
            </div>

            <!-- Emotion Analysis -->
            <div class="p-6 bg-pink-300 rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-medium text-purple-900">Status Emosi Saat Ini</h3>
                </div>
                <div id="emotionStatus" class="text-center text-xl text-purple-800 flex-grow flex items-center justify-center h-48">
                    <p class="text-purple-700 italic">Pilih emosi Anda untuk melihat status.</p>
                </div>
                <div class="mt-6 text-sm text-purple-700 text-center">
                    Analisis berdasarkan emosi yang Anda pilih
                </div>
            </div>
        </div>

        <!-- History Section -->
        <div class="mt-8 p-6 bg-yellow-200 rounded-lg shadow-md">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-medium text-purple-900">Riwayat Emosi</h3>
                <div class="flex space-x-2">
                    <button onclick="filterHistory('7')" class="px-3 py-1 text-sm text-purple-800 bg-white rounded-lg hover:bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-purple-400 filter-btn active">
                        7 Hari
                    </button>
                    <button onclick="filterHistory('30')" class="px-3 py-1 text-sm text-purple-800 bg-yellow-100 rounded-lg hover:bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-purple-400 filter-btn">
                        30 Hari
                    </button>
                </div>
            </div>
            <div class="space-y-4 max-h-96 overflow-y-auto" id="emotionHistory">
                <div class="text-center p-6 text-purple-700 italic">Belum ada data emosi. Mulai catat emosi pertama Anda!</div>
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

<style>
    .flower-petal {
        transition: all 0.7s ease;
    }
    
    .emotion-btn:hover {
        transform: translateY(-5px);
    }
    
    .emotion-btn:active {
        transform: scale(0.95);
    }
    
    .emotion-btn.selected {
        ring: 2px;
        ring-color: #8b5cf6;
        ring-offset: 2px;
        transform: translateY(-2px);
    }
    
    .filter-btn.active {
        background-color: white;
        font-weight: 600;
    }
</style>

<script>
    // State untuk menyimpan data emosi
    let emotions = [];
    let selectedEmotion = null;
    
    // Emotion configurations
    const emotionConfig = {
        'sangat-baik': {
            emoji: '😄',
            label: 'Sangat Baik',
            color: 'bg-green-100',
            textColor: 'text-green-700',
            petalColor: 'bg-pink-400',
            petalOpacity: 'opacity-100',
            petalScale: 'scale-125',
            stemColor: 'bg-green-600',
            stemHeight: 'h-40',
            stemRotate: 'rotate-0',
            centerColor: 'bg-yellow-300',
            leafColor: 'bg-green-400',
            leafOpacity: 'opacity-100',
            status: 'Emosi Anda sangat positif! Terus pertahankan suasana hati yang baik ini. 🌟'
        },
        'baik': {
            emoji: '🙂',
            label: 'Baik',
            color: 'bg-green-50',
            textColor: 'text-green-600',
            petalColor: 'bg-pink-400',
            petalOpacity: 'opacity-90',
            petalScale: 'scale-110',
            stemColor: 'bg-green-500',
            stemHeight: 'h-36',
            stemRotate: 'rotate-0',
            centerColor: 'bg-yellow-300',
            leafColor: 'bg-green-300',
            leafOpacity: 'opacity-90',
            status: 'Hari Anda berjalan dengan baik. Nikmati momen-momen positif ini! 😊'
        },
        'biasa': {
            emoji: '😐',
            label: 'Biasa',
            color: 'bg-blue-50',
            textColor: 'text-blue-600',
            petalColor: 'bg-pink-300',
            petalOpacity: 'opacity-90',
            petalScale: 'scale-100',
            stemColor: 'bg-green-500',
            stemHeight: 'h-32',
            stemRotate: 'rotate-0',
            centerColor: 'bg-yellow-200',
            leafColor: 'bg-green-300',
            leafOpacity: 'opacity-90',
            status: 'Hari yang normal. Cobalah lakukan aktivitas yang Anda sukai untuk meningkatkan mood! 🌼'
        },
        'sedih': {
            emoji: '😔',
            label: 'Sedih',
            color: 'bg-yellow-50',
            textColor: 'text-yellow-600',
            petalColor: 'bg-pink-200',
            petalOpacity: 'opacity-80',
            petalScale: 'scale-90',
            stemColor: 'bg-green-600',
            stemHeight: 'h-28',
            stemRotate: '-rotate-3',
            centerColor: 'bg-yellow-100',
            leafColor: 'bg-green-300',
            leafOpacity: 'opacity-80',
            status: 'Tidak apa-apa merasa sedih. Ingatlah bahwa perasaan ini akan berlalu. Jaga diri Anda baik-baik. 💙'
        },
        'cemas': {
            emoji: '😰',
            label: 'Cemas',
            color: 'bg-orange-50',
            textColor: 'text-orange-600',
            petalColor: 'bg-pink-100',
            petalOpacity: 'opacity-60',
            petalScale: 'scale-75',
            stemColor: 'bg-green-500',
            stemHeight: 'h-24',
            stemRotate: '-rotate-6',
            centerColor: 'bg-yellow-100',
            leafColor: 'bg-green-200',
            leafOpacity: 'opacity-60',
            status: 'Coba ambil napas dalam-dalam. Ingat bahwa Anda lebih kuat dari yang Anda kira. 🌸'
        },
        'marah': {
            emoji: '😡',
            label: 'Marah',
            color: 'bg-red-50',
            textColor: 'text-red-600',
            petalColor: 'bg-pink-100',
            petalOpacity: 'opacity-50',
            petalScale: 'scale-75',
            stemColor: 'bg-green-400',
            stemHeight: 'h-20',
            stemRotate: '-rotate-12',
            centerColor: 'bg-yellow-100',
            leafColor: 'bg-green-100',
            leafOpacity: 'opacity-50',
            status: 'Ambil waktu sejenak untuk menenangkan diri. Cobalah teknik pernapasan atau berjalan sebentar. 🍃'
        }
    };

    // Load emotions from localStorage
    function loadEmotionsFromLocalStorage() {
        const stored = localStorage.getItem('emotions');
        emotions = stored ? JSON.parse(stored) : [];
        renderEmotionHistory();
    }

    // Save emotions to localStorage
    function saveEmotionsToLocalStorage() {
        localStorage.setItem('emotions', JSON.stringify(emotions));
    }

    // Select emotion function
    function selectEmotion(emotion) {
        selectedEmotion = emotion;
        
        // Reset all buttons
        document.querySelectorAll('.emotion-btn').forEach(btn => {
            btn.classList.remove('selected');
        });
        
        // Highlight selected button
        event.currentTarget.classList.add('selected');
        
        // Enable submit button
        document.querySelector('button[type="submit"]').disabled = false;
        
        // Update flower appearance
        updateFlowerAppearance(emotion);
        
        // Update emotion status
        updateEmotionStatus(emotion);
    }

    // Update flower appearance based on emotion
    function updateFlowerAppearance(emotion) {
        const config = emotionConfig[emotion];
        const stem = document.getElementById('stem');
        const leafLeft = document.getElementById('leaf-left');
        const leafRight = document.getElementById('leaf-right');
        const flower = document.getElementById('flower');
        const petals = document.querySelectorAll('.flower-petal');
        const flowerCenter = document.getElementById('flower-center');
        
        // Update stem
        stem.className = `absolute bottom-20 left-1/2 transform -translate-x-1/2 w-3 ${config.stemHeight} ${config.stemColor} ${config.stemRotate} transition-all duration-700 ease-in-out z-20`;
        
        // Update leaves
        leafLeft.className = `absolute bottom-40 left-1/2 transform -translate-x-12 w-12 h-8 ${config.leafColor} ${config.leafOpacity} rounded-full skew-x-12 transition-all duration-700 z-10 shadow-sm`;
        leafRight.className = `absolute bottom-48 left-1/2 transform translate-x-4 w-12 h-8 ${config.leafColor} ${config.leafOpacity} rounded-full -skew-x-12 transition-all duration-700 z-30 shadow-sm`;
        
        // Update flower
        flower.className = `absolute top-6 left-1/2 transform -translate-x-1/2 transition-all duration-700 ${config.petalScale} z-40`;
        
        // Update petals
        petals.forEach(petal => {
            petal.className = `flower-petal absolute w-16 h-16 ${config.petalColor} ${config.petalOpacity} rounded-full transform ${petal.style.transform || petal.className.includes('translate-x-8 -translate-y-8') ? 'translate-x-8 -translate-y-8' : petal.className.includes('-translate-x-8 -translate-y-8') ? '-translate-x-8 -translate-y-8' : petal.className.includes('-translate-x-8 translate-y-8') ? '-translate-x-8 translate-y-8' : 'translate-x-8 translate-y-8'} transition-all duration-700 shadow-md`;
        });
        
        // Update flower center
        flowerCenter.className = `absolute w-10 h-10 ${config.centerColor} rounded-full transform -translate-x-5 -translate-y-5 z-50 shadow-inner`;
    }

    // Update emotion status display
    function updateEmotionStatus(emotion) {
        const config = emotionConfig[emotion];
        const statusDiv = document.getElementById('emotionStatus');
        
        statusDiv.innerHTML = `
            <div>
                <p class="text-2xl mb-4">${config.emoji}</p>
                <p class="font-bold text-2xl ${config.textColor} mb-2">${config.label}</p>
                <p class="text-purple-800">${config.status}</p>
            </div>
        `;
    }

    // Handle form submission
    document.getElementById('emotionForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (!selectedEmotion) return;
        
        const note = document.getElementById('note').value;
        const currentDate = new Date();
        
        // Format tanggal: DD/MM/YYYY
        const formattedDate = `${currentDate.getDate().toString().padStart(2, '0')}/${(currentDate.getMonth() + 1).toString().padStart(2, '0')}/${currentDate.getFullYear()}`;
        
        // Format waktu: HH:MM
        const formattedTime = `${currentDate.getHours().toString().padStart(2, '0')}:${currentDate.getMinutes().toString().padStart(2, '0')}`;
        
        // Buat entry emosi baru
        const newEmotion = {
            id: Date.now(),
            emotion: selectedEmotion,
            note: note,
            date: formattedDate,
            time: formattedTime,
            timestamp: currentDate.getTime()
        };
        
        // Tambahkan ke daftar emosi
        emotions.unshift(newEmotion);
        
        // Simpan ke local storage
        saveEmotionsToLocalStorage();
        
        // Render ulang daftar emosi
        renderEmotionHistory();
        
        // Reset form
        document.getElementById('note').value = '';
        selectedEmotion = null;
        document.querySelector('button[type="submit"]').disabled = true;
        
        // Reset button highlights
        document.querySelectorAll('.emotion-btn').forEach(btn => {
            btn.classList.remove('selected');
        });
        
        // Reset emotion status
        document.getElementById('emotionStatus').innerHTML = '<p class="text-purple-700 italic">Pilih emosi Anda untuk melihat status.</p>';
        
        // Reset flower to default
        updateFlowerAppearance('biasa');
        
        // Show success message
        alert('Emosi berhasil disimpan!');
        
        // Add to history display
        const today = new Date();
        const dateStr = today.getDate() + ' ' + ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'][today.getMonth()] + ' ' + today.getFullYear();
        
        const historyDiv = document.getElementById('emotionHistory');
        const config = emotionConfig[newEmotion.emotion];
        
        // Remove "no data" message if exists
        if (historyDiv.innerHTML.includes('Belum ada data emosi')) {
            historyDiv.innerHTML = '';
        }
        
        const newEntry = document.createElement('div');
        newEntry.className = `p-4 border border-white rounded-lg bg-white hover:transform hover:translate-x-1 transition-all duration-300`;
        newEntry.innerHTML = `
            <div class="flex items-start">
                <div class="text-2xl mr-3">${config.emoji}</div>
                <div class="flex-grow">
                    <div class="flex justify-between items-start">
                        <h4 class="font-medium ${config.textColor}">${config.label}</h4>
                        <span class="text-xs text-gray-500">${newEmotion.date} · ${newEmotion.time}</span>
                    </div>
                    ${newEmotion.note ? `<p class="text-sm text-gray-600 mt-1">${newEmotion.note}</p>` : ''}
                </div>
                <button onclick="deleteEmotion(${newEmotion.id})" class="ml-2 text-gray-400 hover:text-red-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
        `;
        
        // Insert at top
        historyDiv.insertBefore(newEntry, historyDiv.firstChild);
    });

    // Render emotion history
    function renderEmotionHistory() {
        const historyContainer = document.getElementById('emotionHistory');
        historyContainer.innerHTML = '';
        
        if (emotions.length === 0) {
            historyContainer.innerHTML = '<div class="text-center p-6 text-purple-700 italic">Belum ada data emosi. Mulai catat emosi pertama Anda!</div>';
            return;
        }
        
        emotions.forEach(item => {
            const config = emotionConfig[item.emotion];
            
            const emotionElement = document.createElement('div');
            emotionElement.className = `p-4 border border-white rounded-lg bg-white hover:transform hover:translate-x-1 transition-all duration-300`;
            emotionElement.innerHTML = `
                <div class="flex items-start">
                    <div class="text-2xl mr-3">${config.emoji}</div>
                    <div class="flex-grow">
                        <div class="flex justify-between items-start">
                            <h4 class="font-medium ${config.textColor}">${config.label}</h4>
                            <span class="text-xs text-gray-500">${item.date} · ${item.time}</span>
                        </div>
                        ${item.note ? `<p class="text-sm text-gray-600 mt-1">${item.note}</p>` : ''}
                    </div>
                    <button onclick="deleteEmotion(${item.id})" class="ml-2 text-gray-400 hover:text-red-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            `;
            
            historyContainer.appendChild(emotionElement);
        });
    }

    // Delete emotion function
    function deleteEmotion(id) {
        if (confirm('Apakah Anda yakin ingin menghapus catatan emosi ini?')) {
            emotions = emotions.filter(item => item.id !== id);
            saveEmotionsToLocalStorage();
            renderEmotionHistory();
        }
    }

    // Filter history function
    function filterHistory(days) {
        const now = new Date().getTime();
        const dayInMs = 24 * 60 * 60 * 1000;
        
        // Update button states
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active');
            btn.classList.add('bg-yellow-100');
            btn.classList.remove('bg-white');
        });
        
        event.currentTarget.classList.add('active');
        event.currentTarget.classList.add('bg-white');
        event.currentTarget.classList.remove('bg-yellow-100');
        
        // Filter emotions
        const filteredEmotions = emotions.filter(item => (now - item.timestamp) <= days * dayInMs);
        
        const historyContainer = document.getElementById('emotionHistory');
        historyContainer.innerHTML = '';
        
        if (filteredEmotions.length === 0) {
            historyContainer.innerHTML = '<div class="text-center p-6 text-purple-700 italic">Tidak ada data emosi dalam periode ini.</div>';
            return;
        }
        
        filteredEmotions.forEach(item => {
            const config = emotionConfig[item.emotion];
            
            const emotionElement = document.createElement('div');
            emotionElement.className = `p-4 border border-white rounded-lg bg-white hover:transform hover:translate-x-1 transition-all duration-300`;
            emotionElement.innerHTML = `
                <div class="flex items-start">
                    <div class="text-2xl mr-3">${config.emoji}</div>
                    <div class="flex-grow">
                        <div class="flex justify-between items-start">
                            <h4 class="font-medium ${config.textColor}">${config.label}</h4>
                            <span class="text-xs text-gray-500">${item.date} · ${item.time}</span>
                        </div>
                        ${item.note ? `<p class="text-sm text-gray-600 mt-1">${item.note}</p>` : ''}
                    </div>
                    <button onclick="deleteEmotion(${item.id})" class="ml-2 text-gray-400 hover:text-red-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            `;
            
            historyContainer.appendChild(emotionElement);
        });
    }

    // Initialize when page loads
    document.addEventListener('DOMContentLoaded', function() {
        loadEmotionsFromLocalStorage();
        
        // Set flower to default state
        updateFlowerAppearance('biasa');
    });
</script>
@endsection