@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                <a href="/release_emotion" class="flex items-center px-4 py-3 text-purple-900 bg-white rounded-lg">
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
                <h1 class="text-3xl font-bold text-purple-900">Release your Emotion</h1>
                <p class="text-purple-700">Lepaskan emosi dengan bantuan AI companion</p>
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
                        <span class="mr-2">{{ auth()->user()->name ?? 'Excell' }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Character Selection -->
        <div class="mb-8 p-6 bg-purple-200 rounded-lg shadow-md">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-medium text-purple-900">Pilih Karakter untuk Berbicara</h3>
                <p class="text-sm text-purple-700">Setiap karakter memiliki pendekatan yang berbeda</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4" id="character-container">
                <div class="character-card bg-white rounded-lg p-4 cursor-pointer flex flex-col items-center text-center hover:shadow-lg transition-all duration-300" data-character="supportive-friend">
                    <div class="w-16 h-16 rounded-full bg-purple-300 flex items-center justify-center mb-3">
                        <i class="fas fa-user-friends text-2xl text-purple-600"></i>
                    </div>
                    <h4 class="font-medium text-purple-800 mb-1">Sahabat Pengertian</h4>
                    <p class="text-xs text-purple-600">Teman yang selalu ada untukmu</p>
                </div>
                
                <div class="character-card bg-white rounded-lg p-4 cursor-pointer flex flex-col items-center text-center hover:shadow-lg transition-all duration-300" data-character="motivator">
                    <div class="w-16 h-16 rounded-full bg-yellow-200 flex items-center justify-center mb-3">
                        <i class="fas fa-bolt text-2xl text-yellow-600"></i>
                    </div>
                    <h4 class="font-medium text-purple-800 mb-1">Motivator</h4>
                    <p class="text-xs text-purple-600">Memberikan dorongan positif</p>
                </div>
                
                <div class="character-card bg-white rounded-lg p-4 cursor-pointer flex flex-col items-center text-center hover:shadow-lg transition-all duration-300" data-character="calming-presence">
                    <div class="w-16 h-16 rounded-full bg-blue-200 flex items-center justify-center mb-3">
                        <i class="fas fa-water text-2xl text-blue-600"></i>
                    </div>
                    <h4 class="font-medium text-purple-800 mb-1">Penenang</h4>
                    <p class="text-xs text-purple-600">Bantu meredakan kecemasan</p>
                </div>
                
                <div class="character-card bg-white rounded-lg p-4 cursor-pointer flex flex-col items-center text-center hover:shadow-lg transition-all duration-300" data-character="wise-mentor">
                    <div class="w-16 h-16 rounded-full bg-green-200 flex items-center justify-center mb-3">
                        <i class="fas fa-book text-2xl text-green-600"></i>
                    </div>
                    <h4 class="font-medium text-purple-800 mb-1">Mentor Bijak</h4>
                    <p class="text-xs text-purple-600">Memberikan nasihat dan wawasan</p>
                </div>
                
                <div class="character-card bg-white rounded-lg p-4 cursor-pointer flex flex-col items-center text-center hover:shadow-lg transition-all duration-300" data-character="empathetic-listener">
                    <div class="w-16 h-16 rounded-full bg-pink-200 flex items-center justify-center mb-3">
                        <i class="fas fa-headphones text-2xl text-pink-600"></i>
                    </div>
                    <h4 class="font-medium text-purple-800 mb-1">Pendengar Empati</h4>
                    <p class="text-xs text-purple-600">Hanya mendengarkan tanpa menghakimi</p>
                </div>
            </div>
        </div>

        <!-- Chat Area -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden" id="chat-container" style="display: none;">
            <!-- Chat Header -->
            <div class="p-6 bg-purple-300 flex items-center justify-between">
                <div class="flex items-center">
                    <div id="active-character-icon" class="w-12 h-12 rounded-full bg-purple-400 flex items-center justify-center mr-4">
                        <i class="fas fa-user-friends text-purple-700"></i>
                    </div>
                    <div>
                        <h3 id="active-character-name" class="text-lg font-medium text-purple-900">Sahabat Pengertian</h3>
                        <p id="active-character-desc" class="text-sm text-purple-700">Teman yang selalu ada untukmu</p>
                    </div>
                </div>
                <button id="change-character-btn" class="px-4 py-2 bg-white text-purple-700 rounded-lg hover:bg-purple-100 focus:outline-none focus:ring-2 focus:ring-purple-400 transition-colors">
                    Ganti Karakter
                </button>
            </div>
            
            <!-- Chat Messages -->
            <div class="h-96 p-6 overflow-y-auto bg-purple-50" id="messages-container">
                <!-- Messages will be added here -->
            </div>
            
            <!-- Chat Input -->
            <div class="p-6 border-t border-purple-100 bg-white">
                <div class="flex space-x-4">
                    <input type="text" id="message-input" 
                        class="flex-grow px-4 py-3 border border-purple-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" 
                        placeholder="Tuliskan pesan Anda...">
                    <button id="send-message-btn" 
                        class="px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-400 transition-colors">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
                <div class="mt-3 flex items-center text-sm text-purple-600">
                    <i class="fas fa-lock text-xs mr-2"></i>
                    <span>Percakapan Anda bersifat pribadi dan aman</span>
                </div>
            </div>
        </div>

        <!-- Welcome Screen -->
        <div class="bg-white rounded-lg shadow-md p-8 text-center" id="welcome-screen">
            <div class="w-24 h-24 rounded-full bg-purple-200 flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-heart text-4xl text-purple-600"></i>
            </div>
            <h2 class="text-2xl font-bold text-purple-900 mb-4">Lepaskan Emosi Anda</h2>
            <p class="text-purple-700 max-w-2xl mx-auto mb-8 leading-relaxed">
                Pilih salah satu karakter AI untuk membantu Anda mengekspresikan 
                dan memproses emosi. Setiap karakter memiliki pendekatan yang berbeda 
                untuk mendukung kesehatan mental Anda.
            </p>
            <p class="text-purple-500 italic">
                Pilih karakter di atas untuk memulai percakapan
            </p>
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
    .chat-bubble {
        position: relative;
        padding: 12px 16px;
        border-radius: 18px;
        margin-bottom: 12px;
        max-width: 80%;
        word-wrap: break-word;
    }
    
    .ai-bubble {
        background-color: #f3e8ff;
        margin-right: auto;
        border-bottom-left-radius: 6px;
    }
    
    .user-bubble {
        background-color: #ddd6fe;
        margin-left: auto;
        border-bottom-right-radius: 6px;
    }
    
    .character-card:hover {
        transform: translateY(-2px);
    }
    
    .character-active {
        border: 2px solid #8b5cf6;
        transform: translateY(-2px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const characterCards = document.querySelectorAll('.character-card');
        const chatContainer = document.getElementById('chat-container');
        const welcomeScreen = document.getElementById('welcome-screen');
        const messagesContainer = document.getElementById('messages-container');
        const messageInput = document.getElementById('message-input');
        const sendMessageBtn = document.getElementById('send-message-btn');
        const changeCharacterBtn = document.getElementById('change-character-btn');
        
        const activeCharacterIcon = document.getElementById('active-character-icon');
        const activeCharacterName = document.getElementById('active-character-name');
        const activeCharacterDesc = document.getElementById('active-character-desc');
        
        let currentCharacter = null;
        
        const characters = {
            'supportive-friend': {
                name: 'Sahabat Pengertian',
                description: 'Teman yang selalu ada untukmu',
                icon: 'user-friends',
                iconBg: 'bg-purple-300',
                iconColor: 'text-purple-600',
                greeting: 'Halo {{ auth()->user()->name ?? "Excell" }}, apa yang sedang kamu rasakan hari ini? Aku di sini untuk mendengarkan dan mendukungmu.',
                responses: [
                    "Aku mengerti perasaanmu {{ auth()->user()->name ?? "" }}, Tidak apa untuk merasa seperti itu.",
                    "Kamu telah melalui banyak hal, wajar jika merasa begitu. Aku di sini untukmu. Tetap semangat ya {{ auth()->user()->name ?? 'Excell' }}!",
                    "Terima kasih sudah mau bercerita {{ auth()->user()->name ?? "" }}, Bagaimana aku bisa membantumu lebih lanjut?",
                    "Kamu sangat hebat bisa menghadapi semua ini {{ auth()->user()->name ?? "" }}, Aku bangga padamu.",
                    "Kadang kita semua butuh seseorang untuk mendengarkan, Aku senang bisa jadi orang itu untuk mu {{ auth()->user()->name ?? "" }}."
                ]
            },
            'motivator': {
                name: 'Motivator',
                description: 'Memberikan dorongan positif',
                icon: 'bolt',
                iconBg: 'bg-yellow-200',
                iconColor: 'text-yellow-600',
                greeting: 'Semangat {{ auth()->user()->name ?? "Excell" }}! Setiap tantangan adalah kesempatan untuk tumbuh. Apa yang ingin kamu capai hari ini?',
                responses: [
                    "Kamu lebih kuat dari yang kamu kira! Teruslah maju!",
                    "Setiap langkah kecil tetap membawamu lebih dekat ke tujuan. Aku percaya padamu!",
                    "Kesulitan hari ini adalah kekuatan untuk hari esok. Kamu pasti bisa!",
                    "Jangan menyerah! Bayangkan betapa bangganya dirimu nanti ketika berhasil melewati ini.",
                    "Kegagalan hanyalah kesempatan untuk memulai lagi dengan lebih bijak. Ayo coba lagi!"
                ]
            },
            'calming-presence': {
                name: 'Penenang',
                description: 'Bantu meredakan kecemasan',
                icon: 'water',
                iconBg: 'bg-blue-200',
                iconColor: 'text-blue-600',
                greeting: 'Tarik napas dalam-dalam... Lepaskan perlahan, Aku di sini untuk membantu {{ auth()->user()->name ?? "Excell" }} menemukan ketenangan. Apa yang sedang mengganggu pikiranmu?',
                responses: [
                    "Mari fokus pada pernapasan: tarik napas selama 4 hitungan, tahan 4 hitungan, keluarkan 4 hitungan...",
                    "Kamu aman sekarang. Rasakan kakimu berpijak di tanah dan sadari lingkunganmu.",
                    "Kecemasan ini bersifat sementara. Seperti awan, ini akan berlalu.",
                    "Coba rasakan lima hal yang bisa kamu lihat, empat yang bisa disentuh, tiga yang bisa didengar...",
                    "Pelan-pelan saja. Kita hadapi ini bersama, satu momen ketenangan pada satu waktu."
                ]
            },
            'wise-mentor': {
                name: 'Mentor Bijak',
                description: 'Memberikan nasihat dan wawasan',
                icon: 'book',
                iconBg: 'bg-green-200',
                iconColor: 'text-green-600',
                greeting: 'Halo {{ auth()->user()->name ?? "Excell" }}! Apa yang ingin kamu pahami atau refleksikan saat ini?',
                responses: [
                    "Pertimbangkan ini: kadang jawaban yang kita cari ada di dalam pertanyaan yang tepat.",
                    "Perhatikan pola dalam hidupmu. Apa yang coba diajarkan kehidupan padamu?",
                    "Kebijaksanaan datang dari pengalaman, dan pengalaman sering datang dari keputusan yang kurang bijak.",
                    "Terkadang kita harus melepaskan apa yang kita genggam erat untuk menerima apa yang kita butuhkan.",
                    "Jalan terbaik melalui kesulitan adalah dengan menemukan makna di dalamnya."
                ]
            },
            'empathetic-listener': {
                name: 'Pendengar Empati',
                description: 'Hanya mendengarkan tanpa menghakimi',
                icon: 'headphones',
                iconBg: 'bg-pink-200',
                iconColor: 'text-pink-600',
                greeting: 'Ruang ini adalah milik kita untuk berbagi apa pun yang {{ auth()->user()->name ?? "Excell" }} rasakan. Tidak ada judge di sini, hanya pemahaman.',
                responses: [
                    "Aku mendengarkanmu. Lanjutkan jika kamu merasa nyaman.",
                    "Itu pasti sangat sulit bagimu. Aku di sini untuk mendengarkan lebih banyak.",
                    "Perasaanmu valid. Terima kasih telah mempercayaiku dengan ceritamu.",
                    "Aku mendengar kesedihanmu. Kamu tidak sendirian dengan perasaan itu.",
                    "Teruskan... Aku di sini, mendengarkan setiap katamu."
                ]
            }
        };
        
        // Select character
        characterCards.forEach(card => {
            card.addEventListener('click', function() {
                const characterId = this.getAttribute('data-character');
                selectCharacter(characterId);
                
                // Add active class to selected character card
                characterCards.forEach(c => c.classList.remove('character-active'));
                this.classList.add('character-active');
            });
        });
        
        // Change character button
        changeCharacterBtn.addEventListener('click', function() {
            chatContainer.style.display = 'none';
            welcomeScreen.style.display = 'block';
            messagesContainer.innerHTML = '';
            currentCharacter = null;
            characterCards.forEach(c => c.classList.remove('character-active'));
        });
        
        // Send message
        function sendMessage() {
            const message = messageInput.value.trim();
            if (message && currentCharacter) {
                // Add user message to chat
                addMessage(message, 'user');
                messageInput.value = '';
                
                // AI responds after a short delay
                setTimeout(() => {
                    // Get a random response for the current character
                    const responses = characters[currentCharacter].responses;
                    const randomResponse = responses[Math.floor(Math.random() * responses.length)];
                    addMessage(randomResponse, 'ai');
                }, 1000);
            }
        }
        
        sendMessageBtn.addEventListener('click', sendMessage);
        messageInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
        
        // Select character function
        function selectCharacter(characterId) {
            currentCharacter = characterId;
            const character = characters[characterId];
            
            // Update active character display
            activeCharacterIcon.innerHTML = `<i class="fas fa-${character.icon} ${character.iconColor}"></i>`;
            activeCharacterIcon.className = `w-12 h-12 rounded-full ${character.iconBg} flex items-center justify-center mr-4`;
            activeCharacterName.textContent = character.name;
            activeCharacterDesc.textContent = character.description;
            
            // Show chat container, hide welcome screen
            chatContainer.style.display = 'block';
            welcomeScreen.style.display = 'none';
            
            // Clear previous messages
            messagesContainer.innerHTML = '';
            
            // Add greeting message
            addMessage(character.greeting, 'ai');
        }
        
        // Add message to chat
        function addMessage(text, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.className = sender === 'user' ? 'chat-bubble user-bubble' : 'chat-bubble ai-bubble';
            messageDiv.textContent = text;
            
            messagesContainer.appendChild(messageDiv);
            
            // Scroll to bottom
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }
    });
</script>
@endsection