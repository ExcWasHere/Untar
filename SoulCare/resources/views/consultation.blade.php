<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoulCare - Konsultasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script>
        // Data psikolog (statis untuk contoh)
        const psychologists = [
            {
                id: 1,
                name: "Dr. Anita Wijaya, M.Psi",
                photo: "/api/placeholder/100/100",
                specialties: ["Depresi", "Kecemasan", "Trauma"],
                rating: 4.9,
                reviewCount: 128,
                address: "Jl. Gatot Subroto No. 123, Jakarta Selatan",
                availability: "Tersedia hari ini",
                experience: "10 tahun",
                price: "Free/limited session",
                online: true
            },
            {
                id: 2,
                name: "Dr. Budi Santoso, M.Psi",
                photo: "/api/placeholder/100/100",
                specialties: ["Masalah Keluarga", "Stress", "ADHD"],
                rating: 4.7,
                reviewCount: 95,
                address: "Jl. Diponegoro No. 45, Bandung",
                availability: "Tersedia besok",
                experience: "8 tahun",
                price: "Rp300.000/sesi",
                online: false
            },
            {
                id: 3,
                name: "Dr. Citra Handayani, Psi",
                photo: "/api/placeholder/100/100",
                specialties: ["Gangguan Tidur", "Manajemen Emosi", "Self-Development"],
                rating: 4.8,
                reviewCount: 112,
                address: "Jl. Ahmad Yani No. 88, Surabaya",
                availability: "Tersedia hari ini",
                experience: "12 tahun",
                price: "Rp375.000/sesi",
                online: true
            },
            {
                id: 4,
                name: "Dr. Dian Permata, M.Psi",
                photo: "/api/placeholder/100/100",
                specialties: ["Pernikahan", "Trauma Masa Kecil", "Parenting"],
                rating: 4.6,
                reviewCount: 87,
                address: "Jl. Sudirman No. 56, Jakarta Pusat",
                availability: "Tersedia dalam 2 hari",
                experience: "7 tahun",
                price: "Rp325.000/sesi",
                online: true
            },
            {
                id: 5,
                name: "Dr. Eko Prasetyo, Psi",
                photo: "/api/placeholder/100/100", 
                specialties: ["Krisis Identitas", "Bullying", "Social Anxiety"],
                rating: 4.9,
                reviewCount: 134,
                address: "Jl. Thamrin No. 29, Medan",
                availability: "Tersedia hari ini",
                experience: "15 tahun",
                price: "Rp400.000/sesi",
                online: false
            }
        ];

        // Data percakapan contoh
        const conversations = {
            1: [
                { sender: "user", message: "Selamat siang dokter, saya ingin konsultasi mengenai masalah kecemasan yang saya alami belakangan ini.", time: "Kemarin, 14:30" },
                { sender: "psychologist", message: "Selamat siang juga. Terima kasih sudah menghubungi saya. Bisa ceritakan lebih detail tentang kecemasan yang Anda alami? Kapan mulai terjadi dan situasi apa yang biasanya memicu kecemasan tersebut?", time: "Kemarin, 14:35" },
                { sender: "user", message: "Kira-kira 3 bulan yang lalu. Biasanya terjadi saat saya akan melakukan presentasi di kantor atau bertemu dengan banyak orang baru.", time: "Kemarin, 14:40" },
                { sender: "psychologist", message: "Saya mengerti. Kecemasan sosial seperti itu cukup umum terjadi. Apakah ada gejala fisik yang menyertainya, seperti jantung berdebar, keringat dingin, atau tangan gemetar?", time: "Kemarin, 14:43" }
            ]
        };

        // Fungsi untuk menampilkan detail psikolog
        function showPsychologistDetail(id) {
            document.getElementById('psychologist-list').classList.add('hidden');
            document.getElementById('psychologist-detail').classList.remove('hidden');
            document.getElementById('psych-chat').classList.add('hidden');
            
            const psych = psychologists.find(p => p.id === id);
            
            document.getElementById('detail-name').textContent = psych.name;
            document.getElementById('detail-photo').src = psych.photo;
            document.getElementById('detail-rating').textContent = psych.rating;
            document.getElementById('detail-review-count').textContent = psych.reviewCount;
            document.getElementById('detail-address').textContent = psych.address;
            document.getElementById('detail-experience').textContent = psych.experience;
            document.getElementById('detail-price').textContent = psych.price;
            
            const specialtiesContainer = document.getElementById('detail-specialties');
            specialtiesContainer.innerHTML = '';
            psych.specialties.forEach(specialty => {
                const span = document.createElement('span');
                span.className = 'px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs';
                span.textContent = specialty;
                specialtiesContainer.appendChild(span);
                specialtiesContainer.appendChild(document.createTextNode(' '));
            });

            const availabilityBadge = document.getElementById('detail-availability');
            availabilityBadge.textContent = psych.availability;
            availabilityBadge.className = psych.availability.includes('hari ini') 
                ? 'px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs'
                : 'px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs';
                
            const onlineStatusBadge = document.getElementById('online-status');
            onlineStatusBadge.textContent = psych.online ? 'Online' : 'Offline';
            onlineStatusBadge.className = psych.online
                ? 'px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs'
                : 'px-2 py-1 bg-gray-100 text-gray-700 rounded-full text-xs';
        }

        // Fungsi untuk menampilkan chat dengan psikolog
        function startChat(id) {
            document.getElementById('psychologist-detail').classList.add('hidden');
            document.getElementById('psych-chat').classList.remove('hidden');
            
            const psych = psychologists.find(p => p.id === id);
            document.getElementById('chat-psych-name').textContent = psych.name;
            document.getElementById('chat-psych-photo').src = psych.photo;
            
            // Load conversation if exists
            const chatMessages = document.getElementById('chat-messages');
            chatMessages.innerHTML = '';
            
            if (conversations[id]) {
                conversations[id].forEach(msg => {
                    const messageDiv = document.createElement('div');
                    messageDiv.className = msg.sender === 'user' 
                        ? 'flex justify-end mb-4'
                        : 'flex justify-start mb-4';
                    
                    let messageContent = '';
                    if (msg.sender === 'user') {
                        messageContent = `
                            <div class="mr-2 py-3 px-4 bg-purple-500 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white max-w-xs">
                                ${msg.message}
                                <div class="text-xs text-purple-200 mt-1">${msg.time}</div>
                            </div>
                        `;
                    } else {
                        messageContent = `
                            <img src="${psych.photo}" class="object-cover h-8 w-8 rounded-full" alt="${psych.name}">
                            <div class="ml-2 py-3 px-4 bg-gray-100 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-gray-800 max-w-xs">
                                ${msg.message}
                                <div class="text-xs text-gray-500 mt-1">${msg.time}</div>
                            </div>
                        `;
                    }
                    
                    messageDiv.innerHTML = messageContent;
                    chatMessages.appendChild(messageDiv);
                });
            }
            
            // Scroll to bottom of chat
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // Fungsi untuk kembali ke daftar psikolog
        function backToList() {
            document.getElementById('psychologist-detail').classList.add('hidden');
            document.getElementById('psych-chat').classList.add('hidden');
            document.getElementById('psychologist-list').classList.remove('hidden');
        }

        // Fungsi untuk kembali ke detail psikolog
        function backToDetail() {
            document.getElementById('psych-chat').classList.add('hidden');
            document.getElementById('psychologist-detail').classList.remove('hidden');
        }

        // Fungsi untuk mengirim pesan chat
        function sendMessage() {
            const input = document.getElementById('message-input');
            const message = input.value.trim();
            
            if (message) {
                const chatMessages = document.getElementById('chat-messages');
                const now = new Date();
                const timeString = `${now.getHours()}:${now.getMinutes().toString().padStart(2, '0')}`;
                
                const messageDiv = document.createElement('div');
                messageDiv.className = 'flex justify-end mb-4';
                messageDiv.innerHTML = `
                    <div class="mr-2 py-3 px-4 bg-purple-500 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white max-w-xs">
                        ${message}
                        <div class="text-xs text-purple-200 mt-1">Hari ini, ${timeString}</div>
                    </div>
                `;
                
                chatMessages.appendChild(messageDiv);
                input.value = '';
                
                // Auto-scroll to bottom
                chatMessages.scrollTop = chatMessages.scrollHeight;
                
                // Simulate psychologist typing response
                setTimeout(() => {
                    const typingDiv = document.createElement('div');
                    typingDiv.className = 'flex justify-start mb-4';
                    typingDiv.id = 'typing-indicator';
                    
                    const psychId = 1; // Default to first psychologist for this example
                    const psych = psychologists.find(p => p.id === psychId);
                    
                    typingDiv.innerHTML = `
                        <img src="${psych.photo}" class="object-cover h-8 w-8 rounded-full" alt="${psych.name}">
                        <div class="ml-2 py-3 px-4 bg-gray-100 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-gray-800">
                            <div class="typing">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    `;
                    
                    chatMessages.appendChild(typingDiv);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }, 1000);
                
                // Simulate psychologist response
                setTimeout(() => {
                    document.getElementById('typing-indicator').remove();
                    
                    const responseDiv = document.createElement('div');
                    responseDiv.className = 'flex justify-start mb-4';
                    
                    const psychId = 1; // Default to first psychologist for this example
                    const psych = psychologists.find(p => p.id === psychId);
                    const now = new Date();
                    const timeString = `${now.getHours()}:${now.getMinutes().toString().padStart(2, '0')}`;
                    
                    responseDiv.innerHTML = `
                        <img src="${psych.photo}" class="object-cover h-8 w-8 rounded-full" alt="${psych.name}">
                        <div class="ml-2 py-3 px-4 bg-gray-100 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-gray-800 max-w-xs">
                            Terima kasih atas pesannya. Saya akan merespons segera setelah melihat pesan Anda. Mohon kesabarannya.
                            <div class="text-xs text-gray-500 mt-1">Hari ini, ${timeString}</div>
                        </div>
                    `;
                    
                    chatMessages.appendChild(responseDiv);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }, 3000);
            }
        }

        // Filter berdasarkan kategori
        function filterByCategory(category) {
            const buttons = document.querySelectorAll('.filter-btn');
            buttons.forEach(btn => {
                btn.classList.remove('bg-purple-600', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700');
            });

            document.getElementById(category + '-btn').classList.remove('bg-gray-200', 'text-gray-700');
            document.getElementById(category + '-btn').classList.add('bg-purple-600', 'text-white');

            // Di sini Anda bisa menambahkan logika untuk filter
            // Untuk contoh ini, kita hanya mengubah tampilan tombol
        }

        // Fungsi untuk fitur pencarian
        function searchPsychologists() {
            const searchInput = document.getElementById('search-input').value.toLowerCase();
            const psychItems = document.querySelectorAll('.psych-item');
            
            psychItems.forEach(item => {
                const name = item.querySelector('.psych-name').textContent.toLowerCase();
                const specialties = Array.from(item.querySelectorAll('.specialty')).map(s => s.textContent.toLowerCase());
                const address = item.querySelector('.psych-address').textContent.toLowerCase();
                
                if (name.includes(searchInput) || 
                    specialties.some(s => s.includes(searchInput)) || 
                    address.includes(searchInput)) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        }

        // Fungsi untuk menambahkan event listener setelah halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Tambahkan event listener untuk tombol kirim pesan
            document.getElementById('send-button').addEventListener('click', sendMessage);
            
            // Tambahkan event listener untuk input pesan (tekan Enter untuk mengirim)
            document.getElementById('message-input').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });
            
            // Tambahkan event listener untuk pencarian
            document.getElementById('search-input').addEventListener('input', searchPsychologists);
            
            // Tambahkan event listener untuk filter kategori
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const category = this.getAttribute('data-category');
                    filterByCategory(category);
                });
            });
        });
    </script>
    <style>
        /* Animasi untuk indikator typing */
        .typing {
            display: flex;
            align-items: center;
        }
        
        .typing span {
            height: 8px;
            width: 8px;
            margin: 0 2px;
            background-color: #8b5cf6;
            display: block;
            border-radius: 50%;
            opacity: 0.4;
            animation: typing 1s infinite alternate;
        }
        
        .typing span:nth-of-type(1) {
            animation-delay: 0.2s;
        }
        
        .typing span:nth-of-type(2) {
            animation-delay: 0.4s;
        }
        
        .typing span:nth-of-type(3) {
            animation-delay: 0.6s;
        }
        
        @keyframes typing {
            0% {
                opacity: 0.4;
                transform: translateY(0px);
            }
            100% {
                opacity: 1;
                transform: translateY(-4px);
            }
        }
    </style>
</head>
<body class="bg-purple-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
       <div class="fixed inset-y-0 left-0 w-64 bg-purple-300 shadow-lg">
        <div class="flex items-center justify-center h-16 border-b border-purple-400">
            <h2 class="text-2xl font-bold text-purple-900">SoulCare</h2>
        </div>
        <nav class="mt-6">
            <div class="px-4 space-y-2">
                <a href="/" class="flex items-center px-4 py-3 text-purple-900 hover:bg-white rounded-lg">
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
                <a href="/social-flow" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span>Social Flow</span>
                </a>
                <a href="/consultation" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg bg-white">
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
        <div class="flex-1 p-8 ml-64">
            <!-- Psychologist List View -->
            <div id="psychologist-list">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-purple-800">Konsultasi dengan Psikolog</h1>
                    <div class="flex items-center">
                        <div class="relative">
                            <input type="text" id="search-input" class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600" placeholder="Cari psikolog...">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                </div>
                
                <!-- Filter Categories -->
                <div class="flex space-x-2 mb-6 overflow-x-auto pb-2">
                    <button id="all-btn" class="filter-btn px-4 py-2 rounded-full bg-purple-600 text-white" data-category="all">Semua</button>
                    <button id="depression-btn" class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-700" data-category="depression">Depresi</button>
                    <button id="anxiety-btn" class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-700" data-category="anxiety">Kecemasan</button>
                    <button id="family-btn" class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-700" data-category="family">Keluarga</button>
                    <button id="stress-btn" class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-700" data-category="stress">Stress</button>
                    <button id="sleep-btn" class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-700" data-category="sleep">Gangguan Tidur</button>
                    <button id="trauma-btn" class="filter-btn px-4 py-2 rounded-full bg-gray-200 text-gray-700" data-category="trauma">Trauma</button>
                </div>
                
                <!-- Psychologist Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Psychologist Card 1 -->
                    <div class="psych-item bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="p-6">
                            <div class="flex items-start">
                                <img src="/api/placeholder/100/100" class="w-16 h-16 rounded-full object-cover" alt="Psychologist">
                                <div class="ml-4 flex-1">
                                    <div class="flex justify-between">
                                        <h3 class="psych-name text-lg font-semibold text-gray-800">Dr. Anita Wijaya, M.Psi</h3>
                                        <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Online</span>
                                    </div>
                                    <div class="flex items-center mt-1">
                                        <i class="fas fa-star text-yellow-400"></i>
                                        <span class="ml-1 text-gray-700">4.9</span>
                                        <span class="ml-1 text-gray-500">(128 ulasan)</span>
                                    </div>
                                    <p class="psych-address text-gray-600 text-sm mt-1">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        Jl. Gatot Subroto No. 123, Jakarta Selatan
                                    </p>
                                    <div class="mt-2 flex flex-wrap gap-1">
                                        <span class="specialty px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Depresi</span>
                                        <span class="specialty px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Kecemasan</span>
                                        <span class="specialty px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Trauma</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Pengalaman: 10 tahun</p>
                                    <p class="text-sm font-medium text-purple-700">Free/limited session</p>
                                </div>
                                <button onclick="showPsychologistDetail(1)" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Psychologist Card 2 -->
                    <div class="psych-item bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="p-6">
                            <div class="flex items-start">
                                <img src="/api/placeholder/100/100" class="w-16 h-16 rounded-full object-cover" alt="Psychologist">
                                <div class="ml-4 flex-1">
                                    <div class="flex justify-between">
                                        <h3 class="psych-name text-lg font-semibold text-gray-800">Dr. Budi Santoso, M.Psi</h3>
                                        <span class="inline-flex items-center px-2 py-1 bg-gray-100 text-gray-700 rounded-full text-xs">Offline</span>
                                    </div>
                                    <div class="flex items-center mt-1">
                                        <i class="fas fa-star text-yellow-400"></i>
                                        <span class="ml-1 text-gray-700">4.7</span>
                                        <span class="ml-1 text-gray-500">(95 ulasan)</span>
                                    </div>
                                    <p class="psych-address text-gray-600 text-sm mt-1">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        Jl. Diponegoro No. 45, Bandung
                                    </p>
                                    <div class="mt-2 flex flex-wrap gap-1">
                                        <span class="specialty px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Masalah Keluarga</span>
                                        <span class="specialty px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Stress</span>
                                        <span class="specialty px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">ADHD</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Pengalaman: 8 tahun</p>
                                    <p class="text-sm font-medium text-purple-700">Rp300.000/sesi</p>
                                </div>
                                <button onclick="showPsychologistDetail(2)" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Psychologist Card 3 -->
                    <div class="psych-item bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="p-6">
                            <div class="flex items-start">
                                <img src="/api/placeholder/100/100" class="w-16 h-16 rounded-full object-cover" alt="Psychologist">
                                <div class="ml-4 flex-1">
                                    <div class="flex justify-between">
                                        <h3 class="psych-name text-lg font-semibold text-gray-800">Dr. Citra Handayani, Psi</h3>
                                        <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Online</span>
                                    </div>
                                    <div class="flex items-center mt-1">
                                        <i class="fas fa-star text-yellow-400"></i>
                                        <span class="ml-1 text-gray-700">4.8</span>
                                        <span class="ml-1 text-gray-500">(112 ulasan)</span>
                                    </div>
                                    <p class="psych-address text-gray-600 text-sm mt-1">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        Jl. Ahmad Yani No. 88, Surabaya
                                    </p>
                                    <div class="mt-2 flex flex-wrap gap-1">
                                        <span class="specialty px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Gangguan Tidur</span>
                                        <span class="specialty px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Manajemen Emosi</span>
                                        <span class="specialty px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Self-Development</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Pengalaman: 12 tahun</p>
                                    <p class="text-sm font-medium text-purple-700">Rp375.000/sesi</p>
                                </div>
                                <button onclick="showPsychologistDetail(3)" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Psychologist Card 4 -->
                    <div class="psych-item bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="p-6">
                            <div class="flex items-start">
                                <img src="/api/placeholder/100/100" class="w-16 h-16 rounded-full object-cover" alt="Psychologist">
                                <div class="ml-4 flex-1">
                                    <div class="flex justify-between">
                                        <h3 class="psych-name text-lg font-semibold text-gray-800">Dr. Dian Permata, M.Psi</h3>
                                        <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Online</span>
                                    </div>
                                    <div class="flex items-center mt-1">
                                        <i class="fas fa-star text-yellow-400"></i>
                                        <span class="ml-1 text-gray-700">4.6</span>
                                        <span class="ml-1 text-gray-500">(87 ulasan)</span>
                                    </div>
                                    <p class="psych-address text-gray-600 text-sm mt-1">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        Jl. Sudirman No. 56, Jakarta Pusat
                                    </p>
                                    <div class="mt-2 flex flex-wrap gap-1">
                                        <span class="specialty px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Pernikahan</span>
                                        <span class="specialty px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Trauma Masa Kecil</span>
                                        <span class="specialty px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Parenting</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Pengalaman: 7 tahun</p>
                                    <p class="text-sm font-medium text-purple-700">Rp325.000/sesi</p>
                                </div>
                                <button onclick="showPsychologistDetail(4)" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Psychologist Card 5 -->
                    <div class="psych-item bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="p-6">
                            <div class="flex items-start">
                                <img src="/api/placeholder/100/100" class="w-16 h-16 rounded-full object-cover" alt="Psychologist">
                                <div class="ml-4 flex-1">
                                    <div class="flex justify-between">
                                        <h3 class="psych-name text-lg font-semibold text-gray-800">Dr. Eko Prasetyo, Psi</h3>
                                        <span class="inline-flex items-center px-2 py-1 bg-gray-100 text-gray-700 rounded-full text-xs">Offline</span>
                                    </div>
                                    <div class="flex items-center mt-1">
                                        <i class="fas fa-star text-yellow-400"></i>
                                        <span class="ml-1 text-gray-700">4.9</span>
                                        <span class="ml-1 text-gray-500">(134 ulasan)</span>
                                    </div>
                                    <p class="psych-address text-gray-600 text-sm mt-1">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        Jl. Thamrin No. 29, Medan
                                    </p>
                                    <div class="mt-2 flex flex-wrap gap-1">
                                        <span class="specialty px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Krisis Identitas</span>
                                        <span class="specialty px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Bullying</span>
                                        <span class="specialty px-2 py-1 bg-purple-100 text-purple-700 rounded-full text-xs">Social Anxiety</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Pengalaman: 15 tahun</p>
                                    <p class="text-sm font-medium text-purple-700">Rp400.000/sesi</p>
                                </div>
                                <button onclick="showPsychologistDetail(5)" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Psychologist Detail View -->
            <div id="psychologist-detail" class="hidden">
                <div class="mb-4">
                    <button onclick="backToList()" class="flex items-center text-purple-600 hover:text-purple-700">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Daftar Psikolog
                    </button>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-8">
                        <div class="flex items-start">
                            <img id="detail-photo" src="" class="w-24 h-24 rounded-full object-cover" alt="Psychologist">
                            <div class="ml-6 flex-1">
                                <div class="flex items-center justify-between">
                                    <h2 id="detail-name" class="text-2xl font-bold text-gray-800"></h2>
                                    <span id="online-status" class="px-3 py-1 rounded-full text-sm"></span>
                                </div>
                                <div class="flex items-center mt-2">
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <span id="detail-rating" class="ml-2 text-lg font-semibold text-gray-700"></span>
                                    <span class="ml-2 text-gray-500">(<span id="detail-review-count"></span> ulasan)</span>
                                </div>
                                <p id="detail-address" class="text-gray-600 mt-2">
                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                </p>
                                <div id="detail-specialties" class="mt-3 flex flex-wrap gap-2">
                                    <!-- Specialties will be populated by JavaScript -->
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                            <div class="bg-purple-50 rounded-lg p-4">
                                <h4 class="font-semibold text-purple-800 mb-2">Pengalaman</h4>
                                <p id="detail-experience" class="text-gray-700"></p>
                            </div>
                            <div class="bg-purple-50 rounded-lg p-4">
                                <h4 class="font-semibold text-purple-800 mb-2">Ketersediaan</h4>
                                <span id="detail-availability" class="px-2 py-1 rounded-full text-sm"></span>
                            </div>
                            <div class="bg-purple-50 rounded-lg p-4">
                                <h4 class="font-semibold text-purple-800 mb-2">Tarif</h4>
                                <p id="detail-price" class="text-gray-700 font-semibold"></p>
                            </div>
                        </div>
                        
                        <div class="mt-8">
                            <h4 class="font-semibold text-gray-800 mb-4">Tentang Psikolog</h4>
                            <p class="text-gray-600 leading-relaxed">
                                Seorang psikolog berpengalaman yang telah membantu ratusan klien mengatasi berbagai masalah mental dan emosional. 
                                Menggunakan pendekatan terapi yang personal dan disesuaikan dengan kebutuhan masing-masing klien.
                            </p>
                        </div>
                        
                        <div class="mt-8 flex space-x-4">
                            <button onclick="startChat(1)" class="flex-1 px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-semibold transition-colors">
                                <i class="fas fa-comments mr-2"></i>
                                Mulai Konsultasi
                            </button>
                            <button class="px-6 py-3 border border-purple-600 text-purple-600 hover:bg-purple-50 rounded-lg font-semibold transition-colors">
                                <i class="fas fa-heart mr-2"></i>
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Chat Interface -->
            <div id="psych-chat" class="hidden">
                <div class="flex flex-col h-screen max-h-screen">
                    <!-- Chat Header -->
                    <div class="bg-white shadow-sm border-b border-gray-200 p-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <button onclick="backToDetail()" class="mr-4 text-purple-600 hover:text-purple-700">
                                    <i class="fas fa-arrow-left"></i>
                                </button>
                                <img id="chat-psych-photo" src="" class="w-10 h-10 rounded-full object-cover" alt="Psychologist">
                                <div class="ml-3">
                                    <h3 id="chat-psych-name" class="font-semibold text-gray-800"></h3>
                                    <p class="text-sm text-green-600">Online</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button class="p-2 text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-phone"></i>
                                </button>
                                <button class="p-2 text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-video"></i>
                                </button>
                                <button class="p-2 text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Chat Messages -->
                    <div id="chat-messages" class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50">
                        <!-- Messages will be populated by JavaScript -->
                    </div>
                    
                    <!-- Chat Input -->
                    <div class="bg-white border-t border-gray-200 p-4">
                        <div class="flex items-center space-x-2">
                            <button class="p-2 text-gray-500 hover:text-gray-700 rounded-full hover:bg-gray-100">
                                <i class="fas fa-paperclip"></i>
                            </button>
                            <div class="flex-1 relative">
                                <input 
                                    type="text" 
                                    id="message-input" 
                                    class="w-full py-3 px-4 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                                    placeholder="Ketik pesan Anda..."
                                >
                            </div>
                            <button 
                                id="send-button" 
                                class="p-3 bg-purple-600 hover:bg-purple-700 text-white rounded-full transition-colors"
                            >
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>