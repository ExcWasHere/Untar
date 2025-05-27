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
                <h1 class="text-3xl font-bold text-purple-900">Emotion Snacks</h1>
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
                
                <!-- Image Display Container -->
                <div class="flex justify-center mb-8">
                    <div id="emotion-image-container" class="relative w-64 h-80 bg-transparent rounded-lg shadow-lg flex items-center justify-center border-2 border-dashed border-purple-400">
                        <!-- Default placeholder -->
                        <div id="default-placeholder" class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto text-purple-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="text-purple-700 text-sm">Pilih emosi untuk melihat gambar</p>
                        </div>
                        
                        <!-- Emotion image display -->
                        <img id="emotion-image" src="" alt="Emotion Image" class="w-full h-full object-cover rounded-lg hidden transition-all duration-500 ease-in-out">
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

    /* Image transition effects */
    #emotion-image {
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    #emotion-image.fade-in {
        opacity: 1;
        transform: scale(1);
    }

    #emotion-image.fade-out {
        opacity: 0;
        transform: scale(0.95);
    }
</style>

<script>
    // State untuk menyimpan data emosi
    let emotions = [];
    let selectedEmotion = null;
    
    // Emotion configurations with image paths
    const emotionConfig = {
        'sangat-baik': {
            emoji: '😄',
            label: 'Sangat Baik',
            color: 'bg-green-100',
            textColor: 'text-green-700',
            imagePath: 'sanbgat-baik.png',
            status: 'Cupcake Stroberi datang membawa pesta! Harimu manis banget, kayak kamu! Terus sebarkan rasa bahagia ini ke sekitarmu, ya! 🌟'
        },
        'baik': {
            emoji: '🙂',
            label: 'Baik',
            color: 'bg-green-50',
            textColor: 'text-green-600',
            imagePath: 'baik.png',
            status: 'Hari ini enak banget! Nikmati momen-momen kecil yang bikin harimu spesial. 😊'
        },
        'biasa': {
            emoji: '😐',
            label: 'Biasa',
            color: 'bg-blue-50',
            textColor: 'text-blue-600',
            imagePath: 'biasa.png',
            status: 'Nggak harus luar biasa kok, yang penting kamu tetap jalan terus. Tenang aja, hari biasa juga tetap berharga. 🌼'
        },
        'sedih': {
            emoji: '😔',
            label: 'Sedih',
            color: 'bg-yellow-50',
            textColor: 'text-yellow-600',
            imagePath: 'sedih.png',
            status: 'Kopi merah hadir buat nemenin kamu...  Kadang perasaan turun, tapi itu bukan akhir cerita. Yuk, istirahat sejenak. Kamu nggak sendiri. 💙'
        },
        'cemas': {
            emoji: '😰',
            label: 'Cemas',
            color: 'bg-orange-50',
            textColor: 'text-orange-600',
            imagePath: 'cemas.png',
            status: 'Pelan-pelan, ya... semua akan baik-baik saja. Tarik napas dalam, dan minum segelas ketenangan. 🌸'
        },
        'marah': {
            emoji: '😡',
            label: 'Marah',
            color: 'bg-red-50',
            textColor: 'text-red-600',
            imagePath: 'marah.png',
            status: 'Lampiasin marahmu lewat hal-hal positif! Gerak dikit, tarik napas, kamu pasti bisa atur emosimu dengan keren. 🍃'
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
        
        // Update image display
        updateEmotionImage(emotion);
        
        // Update emotion status
        updateEmotionStatus(emotion);
    }

    // Update emotion image display
    function updateEmotionImage(emotion) {
        const config = emotionConfig[emotion];
        const emotionImage = document.getElementById('emotion-image');
        const defaultPlaceholder = document.getElementById('default-placeholder');
        
        // Hide placeholder
        defaultPlaceholder.style.display = 'none';
        
        // Update image source and show with transition
        emotionImage.src = config.imagePath;
        emotionImage.alt = `Emosi ${config.label}`;
        emotionImage.classList.remove('hidden');
        
        // Add fade-in effect
        setTimeout(() => {
            emotionImage.classList.add('fade-in');
        }, 50);
        
        // Handle image load error
        emotionImage.onerror = function() {
            // If image fails to load, show placeholder with error message
            this.style.display = 'none';
            defaultPlaceholder.style.display = 'block';
            defaultPlaceholder.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto text-red-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-red-600 text-sm">Gambar tidak ditemukan</p>
                <p class="text-gray-500 text-xs mt-1">Path: ${config.imagePath}</p>
            `;
        };
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
        
        // Reset image display
        resetImageDisplay();
        
        // Show success message
        alert('Emosi berhasil disimpan!');
    });

    // Reset image display to default
    function resetImageDisplay() {
        const emotionImage = document.getElementById('emotion-image');
        const defaultPlaceholder = document.getElementById('default-placeholder');
        
        emotionImage.classList.add('fade-out');
        
        setTimeout(() => {
            emotionImage.classList.add('hidden');
            emotionImage.classList.remove('fade-in', 'fade-out');
            defaultPlaceholder.style.display = 'block';
            defaultPlaceholder.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto text-purple-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <p class="text-purple-700 text-sm">Pilih emosi untuk melihat gambar</p>
            `;
        }, 250);
    }

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
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
        if (confirm('Apakah Anda yakin ingin menghapus data emosi ini?')) {
            emotions = emotions.filter(emotion => emotion.id !== id);
            saveEmotionsToLocalStorage();
            renderEmotionHistory();
        }
    }

    // Filter history function
    function filterHistory(days) {
        // Update active filter button
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active');
            btn.classList.add('bg-yellow-100');
        });
        event.currentTarget.classList.add('active');
        event.currentTarget.classList.remove('bg-yellow-100');
        
        const currentTime = new Date().getTime();
        const filterTime = parseInt(days) * 24 * 60 * 60 * 1000; // Convert days to milliseconds
        
        // Filter emotions based on selected timeframe
        const filteredEmotions = emotions.filter(emotion => {
            return (currentTime - emotion.timestamp) <= filterTime;
        });
        
        // Temporarily store original emotions
        const originalEmotions = [...emotions];
        emotions = filteredEmotions;
        
        // Render filtered history
        renderEmotionHistory();
        
        // Restore original emotions after 3 seconds to show filter is temporary
        setTimeout(() => {
            emotions = originalEmotions;
        }, 100);
    }

    // Show all emotions function (reset filter)
    function showAllEmotions() {
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active');
            btn.classList.add('bg-yellow-100');
        });
        renderEmotionHistory();
    }

    // Initialize the application
    document.addEventListener('DOMContentLoaded', function() {
        loadEmotionsFromLocalStorage();
        
        // Add some sample data if no emotions exist (for demo purposes)
        if (emotions.length === 0) {
            const sampleEmotions = [
                {
                    id: Date.now() - 86400000, // 1 day ago
                    emotion: 'baik',
                    note: 'Hari yang produktif di kantor',
                    date: new Date(Date.now() - 86400000).toLocaleDateString('id-ID'),
                    time: '14:30',
                    timestamp: Date.now() - 86400000
                },
                {
                    id: Date.now() - 172800000, // 2 days ago
                    emotion: 'sangat-baik',
                    note: 'Berhasil menyelesaikan proyek besar!',
                    date: new Date(Date.now() - 172800000).toLocaleDateString('id-ID'),
                    time: '16:45',
                    timestamp: Date.now() - 172800000
                },
                {
                    id: Date.now() - 259200000, // 3 days ago
                    emotion: 'sedih',
                    note: 'Merasa lelah dan overwhelmed',
                    date: new Date(Date.now() - 259200000).toLocaleDateString('id-ID'),
                    time: '09:15',
                    timestamp: Date.now() - 259200000
                }
            ];
            
            // Uncomment the line below to add sample data
            // emotions = sampleEmotions;
            // saveEmotionsToLocalStorage();
            // renderEmotionHistory();
        }
    });

    // Add keyboard navigation
    document.addEventListener('keydown', function(e) {
        // Press 1-6 to select emotions quickly
        const emotionKeys = {
            '1': 'sangat-baik',
            '2': 'baik',
            '3': 'biasa',
            '4': 'sedih',
            '5': 'cemas',
            '6': 'marah'
        };
        
        if (emotionKeys[e.key]) {
            const emotionButtons = document.querySelectorAll('.emotion-btn');
            const index = parseInt(e.key) - 1;
            if (emotionButtons[index]) {
                emotionButtons[index].click();
            }
        }
        
        // Press Enter to submit form when emotion is selected
        if (e.key === 'Enter' && selectedEmotion && e.target.tagName !== 'BUTTON') {
            e.preventDefault();
            document.getElementById('emotionForm').dispatchEvent(new Event('submit'));
        }
    });

    // Add smooth scrolling to history section when new emotion is added
    function scrollToHistory() {
        document.getElementById('emotionHistory').scrollIntoView({ 
            behavior: 'smooth',
            block: 'nearest'
        });
    }

    // Auto-save draft notes
    let autoSaveTimeout;
    document.getElementById('note').addEventListener('input', function(e) {
        clearTimeout(autoSaveTimeout);
        autoSaveTimeout = setTimeout(() => {
            localStorage.setItem('draft_note', e.target.value);
        }, 1000);
    });

    // Load draft note on page load
    window.addEventListener('load', function() {
        const draftNote = localStorage.getItem('draft_note');
        if (draftNote) {
            document.getElementById('note').value = draftNote;
        }
    });

    // Clear draft when form is submitted
    document.getElementById('emotionForm').addEventListener('submit', function() {
        localStorage.removeItem('draft_note');
        setTimeout(scrollToHistory, 500);
    });

    // Add notification functionality
    function requestNotificationPermission() {
        if ('Notification' in window && Notification.permission !== 'granted') {
            Notification.requestPermission();
        }
    }

    // Daily reminder notification
    function setDailyReminder() {
        if ('Notification' in window && Notification.permission === 'granted') {
            // Check if user has logged emotion today
            const today = new Date().toDateString();
            const todayEmotions = emotions.filter(emotion => {
                const emotionDate = new Date(emotion.timestamp).toDateString();
                return emotionDate === today;
            });

            if (todayEmotions.length === 0) {
                new Notification('SoulCare Reminder', {
                    body: 'Jangan lupa catat emosi Anda hari ini! 😊',
                    icon: '/favicon.ico'
                });
            }
        }
    }

    // Set up daily reminder (every 6 hours)
    setInterval(setDailyReminder, 6 * 60 * 60 * 1000);

    // Request notification permission on first interaction
    document.addEventListener('click', requestNotificationPermission, { once: true });
</script>

@endsection