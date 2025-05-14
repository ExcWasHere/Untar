<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoulCare - Release your Emotion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .chat-bubble {
            position: relative;
            padding: 10px 15px;
            border-radius: 15px;
            margin-bottom: 10px;
            max-width: 80%;
        }
        .chat-bubble::after {
            content: '';
            position: absolute;
            bottom: -5px;
            width: 10px;
            height: 10px;
        }
        .ai-bubble {
            background-color: #f3e8ff;
            margin-right: auto;
            border-bottom-left-radius: 0;
        }
        .ai-bubble::after {
            left: -5px;
            border-bottom-right-radius: 50%;
            background-color: #f3e8ff;
        }
        .user-bubble {
            background-color: #ddd6fe;
            margin-left: auto;
            border-bottom-right-radius: 0;
        }
        .user-bubble::after {
            right: -5px;
            border-bottom-left-radius: 50%;
            background-color: #ddd6fe;
        }
        .character-card {
            transition: all 0.3s ease;
        }
        .character-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .character-active {
            border: 2px solid #8b5cf6;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="bg-purple-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 w-64 bg-purple-300 shadow-lg">
        <div class="flex items-center justify-center h-16 border-b border-purple-400">
            <h2 class="text-2xl font-bold text-purple-900">SoulCare</h2>
        </div>
        <nav class="mt-6">
            <div class="px-4 space-y-2">
                <a href="/dashboard" class="flex items-center px-4 py-3 text-purple-900 hover:bg-white rounded-lg">
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
                <a href="/release_emotion" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg bg-white">
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
        <div class="flex-1 flex flex-col ml-64">
            <!-- Header -->
            <header class="bg-white p-4 shadow-sm flex justify-between items-center">
                <h1 class="text-2xl font-bold text-purple-800">Release your Emotion</h1>
                <div class="flex items-center">
                    <button class="p-2 mr-2 bg-purple-100 rounded-lg">
                        <i class="fas fa-bell text-purple-600"></i>
                    </button>
                    <div class="flex items-center bg-purple-100 rounded-lg px-4 py-2">
                        <span class="mr-2">Excell</span>
                        <i class="fas fa-chevron-down text-sm text-purple-600"></i>
                    </div>
                </div>
            </header>

            <!-- Character Selection -->
            <div class="p-4 bg-white m-4 rounded-lg shadow">
                <h2 class="text-lg font-semibold text-purple-800 mb-4">Pilih Karakter untuk Berbicara</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4" id="character-container">
                    <div class="character-card bg-purple-50 rounded-lg p-4 cursor-pointer flex flex-col items-center text-center" data-character="supportive-friend">
                        <div class="w-16 h-16 rounded-full bg-purple-300 flex items-center justify-center mb-2">
                            <i class="fas fa-user-friends text-2xl text-purple-600"></i>
                        </div>
                        <h3 class="font-medium text-purple-800">Sahabat Pengertian</h3>
                        <p class="text-xs text-purple-600 mt-1">Teman yang selalu ada untukmu</p>
                    </div>
                    
                    <div class="character-card bg-purple-50 rounded-lg p-4 cursor-pointer flex flex-col items-center text-center" data-character="motivator">
                        <div class="w-16 h-16 rounded-full bg-yellow-200 flex items-center justify-center mb-2">
                            <i class="fas fa-bolt text-2xl text-yellow-600"></i>
                        </div>
                        <h3 class="font-medium text-purple-800">Motivator</h3>
                        <p class="text-xs text-purple-600 mt-1">Memberikan dorongan positif</p>
                    </div>
                    
                    <div class="character-card bg-purple-50 rounded-lg p-4 cursor-pointer flex flex-col items-center text-center" data-character="calming-presence">
                        <div class="w-16 h-16 rounded-full bg-blue-200 flex items-center justify-center mb-2">
                            <i class="fas fa-water text-2xl text-blue-600"></i>
                        </div>
                        <h3 class="font-medium text-purple-800">Penenang</h3>
                        <p class="text-xs text-purple-600 mt-1">Bantu meredakan kecemasan</p>
                    </div>
                    
                    <div class="character-card bg-purple-50 rounded-lg p-4 cursor-pointer flex flex-col items-center text-center" data-character="wise-mentor">
                        <div class="w-16 h-16 rounded-full bg-green-200 flex items-center justify-center mb-2">
                            <i class="fas fa-book text-2xl text-green-600"></i>
                        </div>
                        <h3 class="font-medium text-purple-800">Mentor Bijak</h3>
                        <p class="text-xs text-purple-600 mt-1">Memberikan nasihat dan wawasan</p>
                    </div>
                    
                    <div class="character-card bg-purple-50 rounded-lg p-4 cursor-pointer flex flex-col items-center text-center" data-character="empathetic-listener">
                        <div class="w-16 h-16 rounded-full bg-pink-200 flex items-center justify-center mb-2">
                            <i class="fas fa-headphones text-2xl text-pink-600"></i>
                        </div>
                        <h3 class="font-medium text-purple-800">Pendengar Empati</h3>
                        <p class="text-xs text-purple-600 mt-1">Hanya mendengarkan tanpa menghakimi</p>
                    </div>
                </div>
            </div>

            <!-- Chat Area -->
            <div class="flex-grow flex flex-col m-4 rounded-lg shadow bg-white overflow-hidden" id="chat-container" style="display: none;">
                <!-- Chat Header -->
                <div class="p-4 bg-purple-200 flex items-center">
                    <div id="active-character-icon" class="w-10 h-10 rounded-full bg-purple-300 flex items-center justify-center mr-3">
                        <i class="fas fa-user-friends text-purple-600"></i>
                    </div>
                    <div>
                        <h3 id="active-character-name" class="font-medium text-purple-800">Sahabat Pengertian</h3>
                        <p id="active-character-desc" class="text-xs text-purple-600">Teman yang selalu ada untukmu</p>
                    </div>
                    <button id="change-character-btn" class="ml-auto bg-purple-100 hover:bg-purple-200 text-purple-700 px-3 py-1 rounded text-sm">
                        Ganti Karakter
                    </button>
                </div>
                
                <!-- Chat Messages -->
                <div class="flex-grow p-4 overflow-y-auto bg-purple-50" id="messages-container">
                    <!-- Messages will be added here -->
                </div>
                
                <!-- Chat Input -->
                <div class="p-4 border-t border-purple-100">
                    <div class="flex">
                        <input type="text" id="message-input" class="flex-grow p-3 rounded-l-lg border border-purple-300 focus:outline-none focus:ring-2 focus:ring-purple-400" placeholder="Tuliskan pesan Anda...">
                        <button id="send-message-btn" class="bg-purple-600 hover:bg-purple-700 text-white px-6 rounded-r-lg">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                    <div class="mt-2 text-sm text-purple-600">
                        <p class="flex items-center">
                            <i class="fas fa-lock text-xs mr-1"></i>
                            Percakapan Anda bersifat pribadi dan aman
                        </p>
                    </div>
                </div>
            </div>

            <!-- Welcome Screen -->
            <div class="flex-grow flex flex-col items-center justify-center m-4 rounded-lg shadow bg-white p-8" id="welcome-screen">
                <div class="w-24 h-24 rounded-full bg-purple-200 flex items-center justify-center mb-6">
                    <i class="fas fa-heart text-4xl text-purple-600"></i>
                </div>
                <h2 class="text-2xl font-bold text-purple-800 mb-3">Lepaskan Emosi Anda</h2>
                <p class="text-purple-600 text-center max-w-md mb-8">
                    Pilih salah satu karakter AI untuk membantu Anda mengekspresikan 
                    dan memproses emosi. Setiap karakter memiliki pendekatan yang berbeda 
                    untuk mendukung kesehatan mental Anda.
                </p>
                <p class="text-sm text-purple-500 italic">
                    Pilih karakter di atas untuk memulai percakapan
                </p>
            </div>
        </div>
    </div>

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
            
            // Character data
            const characters = {
                'supportive-friend': {
                    name: 'Sahabat Pengertian',
                    description: 'Teman yang selalu ada untukmu',
                    icon: 'user-friends',
                    iconBg: 'bg-purple-300',
                    iconColor: 'text-purple-600',
                    greeting: 'Halo Excell, apa yang sedang kamu rasakan hari ini? Aku di sini untuk mendengarkan dan mendukungmu.',
                    responses: [
                        "Aku mengerti perasaanmu. Tidak apa-apa untuk merasa seperti itu.",
                        "Kamu telah melalui banyak hal, wajar jika merasa begitu. Aku di sini untukmu. Tetap semangat ya Excell!",
                        "Terima kasih sudah berbagi denganku. Bagaimana aku bisa membantumu lebih lanjut?",
                        "Kamu sangat berani bisa menghadapi semua ini. Aku bangga padamu.",
                        "Kadang kita semua butuh seseorang untuk mendengarkan. Aku senang bisa jadi orang itu untukmu."
                    ]
                },
                'motivator': {
                    name: 'Motivator',
                    description: 'Memberikan dorongan positif',
                    icon: 'bolt',
                    iconBg: 'bg-yellow-200',
                    iconColor: 'text-yellow-600',
                    greeting: 'Semangat! Setiap tantangan adalah kesempatan untuk tumbuh. Apa yang ingin kamu capai hari ini?',
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
                    greeting: 'Tarik napas dalam-dalam... Lepaskan perlahan. Aku di sini untuk membantumu menemukan ketenangan. Apa yang sedang mengganggu pikiranmu?',
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
                    greeting: 'Selamat datang, pencari kebijaksanaan. Apa yang ingin kamu pahami atau refleksikan saat ini?',
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
                    greeting: 'Ruang ini adalah milikmu untuk berbagi apa pun yang kamu rasakan. Tidak ada penilaian di sini, hanya pemahaman.',
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
                welcomeScreen.style.display = 'flex';
                messagesContainer.innerHTML = '';
                currentCharacter = null;
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
                activeCharacterIcon.className = `w-10 h-10 rounded-full ${character.iconBg} flex items-center justify-center mr-3`;
                activeCharacterName.textContent = character.name;
                activeCharacterDesc.textContent = character.description;
                
                // Show chat container, hide welcome screen
                chatContainer.style.display = 'flex';
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
</body>
</html>