@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-r from-purple-100 to-blue-100 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-purple-800 mb-2">AI Chat Assistant</h1>
            <p class="text-lg text-gray-600">Diskusikan masalah kesehatan mental Anda dengan asisten AI kami</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Informasi tentang AI Chat -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden md:col-span-1">
                <div class="p-6">
                    <div class="flex items-center justify-center mb-4">
                        <div class="p-3 rounded-full bg-purple-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-2 text-center">Apa itu AI Chat?</h2>
                    <p class="text-gray-600">
                        AI Chat adalah fitur yang memungkinkan Anda berbicara dengan asisten kecerdasan buatan untuk mendapatkan dukungan
                        awal terkait kesehatan mental. AI kami dilatih untuk memberikan respons yang empatis dan informatif.
                    </p>
                    <div class="mt-4">
                        <h3 class="font-medium text-gray-800">Manfaat:</h3>
                        <ul class="mt-2 text-gray-600">
                            <li class="flex items-center">
                                <svg class="h-4 w-4 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Tersedia 24/7
                            </li>
                            <li class="flex items-center mt-1">
                                <svg class="h-4 w-4 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Privasi terjamin
                            </li>
                            <li class="flex items-center mt-1">
                                <svg class="h-4 w-4 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Tanpa penilaian
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Chat Panel -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden md:col-span-2">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">Chat dengan AI</h2>
                        <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-800">Online</span>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-4 h-96 overflow-y-auto mb-4" id="chatMessages">
                        <!-- Pesan selamat datang dari bot -->
                        <div class="flex mb-4">
                            <div class="w-8 h-8 rounded-full bg-purple-500 flex items-center justify-center text-white mr-3 flex-shrink-0">
                                AI
                            </div>
                            <div class="bg-purple-100 rounded-lg rounded-tl-none p-3 max-w-md">
                                <p class="text-gray-700">Halo! Saya asisten AI SoulCare. Bagaimana perasaan Anda hari ini? Apa yang bisa saya bantu?</p>
                                <span class="text-xs text-gray-500 mt-1 block">11:30</span>
                            </div>
                        </div>

                        <!-- Area pesan akan diisi secara dinamis dengan JavaScript -->
                    </div>

                    <form id="chatForm" class="mt-4">
                        <div class="flex items-center">
                            <input type="text" id="messageInput" class="flex-1 border rounded-l-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500" 
                                placeholder="Ketik pesan Anda di sini..." required>
                            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-r-lg transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-6">
                        <a href="{{ route('ai-chats.reply') }}" class="text-purple-600 hover:text-purple-800 text-sm font-medium">
                            Lihat riwayat percakapan sebelumnya
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Topik Populer</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-4 border rounded-lg hover:bg-purple-50 cursor-pointer transition">
                        <h3 class="font-medium text-purple-700">Mengelola Kecemasan</h3>
                        <p class="text-sm text-gray-600 mt-1">Teknik dan tips untuk menangani perasaan cemas</p>
                    </div>
                    <div class="p-4 border rounded-lg hover:bg-purple-50 cursor-pointer transition">
                        <h3 class="font-medium text-purple-700">Mengatasi Stres</h3>
                        <p class="text-sm text-gray-600 mt-1">Strategi efektif untuk mengurangi stres sehari-hari</p>
                    </div>
                    <div class="p-4 border rounded-lg hover:bg-purple-50 cursor-pointer transition">
                        <h3 class="font-medium text-purple-700">Pola Tidur Sehat</h3>
                        <p class="text-sm text-gray-600 mt-1">Cara meningkatkan kualitas tidur Anda</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatForm = document.getElementById('chatForm');
        const messageInput = document.getElementById('messageInput');
        const chatMessages = document.getElementById('chatMessages');

        chatForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const message = messageInput.value.trim();
            
            if (message) {
                // Tambahkan pesan pengguna
                addMessage('user', message);
                messageInput.value = '';
                
                // Simulasikan respons dari AI setelah sedikit penundaan
                setTimeout(() => {
                    // Tampilkan indikator mengetik
                    showTypingIndicator();
                    
                    // Simulasikan respons AI setelah beberapa detik
                    setTimeout(() => {
                        // Hapus indikator mengetik
                        removeTypingIndicator();
                        
                        // Tambahkan respons AI (ini hanya simulasi)
                        const responses = [
                            "Saya mengerti apa yang Anda rasakan. Bisakah Anda ceritakan lebih lanjut tentang hal itu?",
                            "Terima kasih sudah berbagi. Situasi seperti ini memang bisa sangat menantang.",
                            "Itu terdengar sulit. Apakah Anda sudah mencoba teknik pernapasan atau mindfulness?",
                            "Bagaimana perasaan Anda saat menghadapi situasi tersebut?",
                            "Anda tidak sendirian dalam perasaan ini. Banyak orang mengalami hal serupa."
                        ];
                        const randomResponse = responses[Math.floor(Math.random() * responses.length)];
                        addMessage('ai', randomResponse);
                    }, 2000);
                }, 500);
            }
        });

        function addMessage(sender, message) {
            const now = new Date();
            const time = now.getHours() + ':' + (now.getMinutes() < 10 ? '0' : '') + now.getMinutes();
            
            const messageDiv = document.createElement('div');
            messageDiv.className = 'flex mb-4' + (sender === 'user' ? ' justify-end' : '');
            
            if (sender === 'user') {
                messageDiv.innerHTML = `
                    <div class="bg-blue-100 rounded-lg rounded-tr-none p-3 max-w-md">
                        <p class="text-gray-700">${message}</p>
                        <span class="text-xs text-gray-500 mt-1 block">${time}</span>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white ml-3 flex-shrink-0">
                        Anda
                    </div>
                `;
            } else {
                messageDiv.innerHTML = `
                    <div class="w-8 h-8 rounded-full bg-purple-500 flex items-center justify-center text-white mr-3 flex-shrink-0">
                        AI
                    </div>
                    <div class="bg-purple-100 rounded-lg rounded-tl-none p-3 max-w-md">
                        <p class="text-gray-700">${message}</p>
                        <span class="text-xs text-gray-500 mt-1 block">${time}</span>
                    </div>
                `;
            }
            
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function showTypingIndicator() {
            const typingDiv = document.createElement('div');
            typingDiv.className = 'flex mb-4';
            typingDiv.id = 'typingIndicator';
            typingDiv.innerHTML = `
                <div class="w-8 h-8 rounded-full bg-purple-500 flex items-center justify-center text-white mr-3 flex-shrink-0">
                    AI
                </div>
                <div class="bg-purple-100 rounded-lg rounded-tl-none p-3">
                    <div class="flex space-x-1">
                        <div class="typing-dot bg-gray-500 rounded-full"></div>
                        <div class="typing-dot bg-gray-500 rounded-full animation-delay-200"></div>
                        <div class="typing-dot bg-gray-500 rounded-full animation-delay-400"></div>
                    </div>
                </div>
            `;
            
            chatMessages.appendChild(typingDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function removeTypingIndicator() {
            const typingIndicator = document.getElementById('typingIndicator');
            if (typingIndicator) {
                typingIndicator.remove();
            }
        }
    });
</script>

<style>
    .typing-dot {
        width: 8px;
        height: 8px;
        animation: bounce 1.4s infinite;
    }
    
    .animation-delay-200 {
        animation-delay: 0.2s;
    }
    
    .animation-delay-400 {
        animation-delay: 0.4s;
    }
    
    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-4px);
        }
    }
</style>
@endsection