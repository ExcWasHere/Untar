<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoulCare - Panggilan Darurat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .pulse-ring {
            animation: pulse-ring 1.5s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        }
        
        .pulse-dot {
            animation: pulse-dot 1.5s cubic-bezier(0.455, 0.03, 0.515, 0.955) -0.4s infinite;
        }
        
        @keyframes pulse-ring {
            0% {
                transform: scale(0.33);
            }
            40%, 50% {
                opacity: 1;
            }
            100% {
                opacity: 0;
                transform: scale(1.2);
            }
        }
        
        @keyframes pulse-dot {
            0% {
                transform: scale(0.8);
            }
            50% {
                transform: scale(1);
            }
            100% {
                transform: scale(0.8);
            }
        }
        
        .call-animation {
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }
        
        .timer {
            font-variant-numeric: tabular-nums;
        }
        
        .wave {
            animation: wave 1s ease-in-out infinite;
        }
        
        .wave:nth-child(2) { animation-delay: 0.1s; }
        .wave:nth-child(3) { animation-delay: 0.2s; }
        .wave:nth-child(4) { animation-delay: 0.3s; }
        .wave:nth-child(5) { animation-delay: 0.4s; }
        
        @keyframes wave {
            0%, 40%, 100% {
                transform: scaleY(0.4);
            }
            20% {
                transform: scaleY(1);
            }
        }
        
        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-red-600 via-red-500 to-pink-600 min-h-screen flex items-center justify-center p-4">
    
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, white 2px, transparent 2px), radial-gradient(circle at 75% 75%, white 2px, transparent 2px); background-size: 50px 50px;"></div>
    </div>
    
    <!-- Main Call Interface -->
    <div class="relative z-10 w-full max-w-md mx-auto">
        <!-- Emergency Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center bg-white bg-opacity-20 backdrop-blur-md text-white px-4 py-2 rounded-full mb-4">
                <svg class="w-5 h-5 mr-2 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                <span class="font-medium">PANGGILAN DARURAT</span>
            </div>
        </div>
        
        <!-- Call Interface Card -->
        <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-3xl p-8 shadow-2xl border border-white border-opacity-20">
            
            <!-- Contact Info -->
            <div class="text-center text-white mb-8">
                <h2 class="text-2xl font-bold mb-2">Hotline Darurat</h2>
                <div class="text-4xl font-bold mb-2 tracking-wider">119</div>
                <p class="text-white text-opacity-80">Pusat Bantuan SoulCare</p>
            </div>
            
            <!-- Avatar and Status -->
            <div class="text-center mb-8">
                <div class="relative inline-block">
                    <!-- Pulse Animation -->
                    <div class="absolute inset-0 rounded-full bg-white opacity-30 pulse-ring"></div>
                    <div class="absolute inset-0 rounded-full bg-white opacity-40 pulse-dot"></div>
                    
                    <!-- Avatar -->
                    <div class="relative w-32 h-32 bg-white bg-opacity-20 rounded-full flex items-center justify-center call-animation">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                </div>
                
                <!-- Call Status -->
                <div class="mt-4">
                    <div id="callStatus" class="text-white text-lg font-medium mb-2">Menghubungi...</div>
                    <div id="callTimer" class="text-white text-opacity-80 text-2xl font-mono timer">00:00</div>
                </div>
                
                <!-- Audio Wave Animation -->
                <div class="flex justify-center items-center space-x-1 mt-4" id="audioWave" style="display: none;">
                    <div class="w-1 bg-white bg-opacity-60 rounded-full wave" style="height: 10px;"></div>
                    <div class="w-1 bg-white bg-opacity-60 rounded-full wave" style="height: 20px;"></div>
                    <div class="w-1 bg-white bg-opacity-60 rounded-full wave" style="height: 15px;"></div>
                    <div class="w-1 bg-white bg-opacity-60 rounded-full wave" style="height: 25px;"></div>
                    <div class="w-1 bg-white bg-opacity-60 rounded-full wave" style="height: 12px;"></div>
                </div>
            </div>
            
            <!-- Call Controls -->
            <div class="flex justify-center space-x-6 mb-6">
                <!-- Mute Button -->
                <button id="muteBtn" class="bg-white bg-opacity-20 backdrop-blur-md text-white p-4 rounded-full hover:bg-opacity-30 transition-all duration-300">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.617.814L4.382 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.382l4.001-3.814a1 1 0 011.617.076zM12.293 7.293a1 1 0 011.414 0L15 8.586l1.293-1.293a1 1 0 111.414 1.414L16.414 10l1.293 1.293a1 1 0 01-1.414 1.414L15 11.414l-1.293 1.293a1 1 0 01-1.414-1.414L13.586 10l-1.293-1.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
                
                <!-- Speaker Button -->
                <button id="speakerBtn" class="bg-white bg-opacity-20 backdrop-blur-md text-white p-4 rounded-full hover:bg-opacity-30 transition-all duration-300">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.617.814L4.382 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.382l4.001-3.814a1 1 0 011.617.076zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
            
            <!-- End Call Button -->
            <div class="text-center">
                <button onclick="endCall()" class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-full font-medium shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center justify-center mx-auto">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        <path d="M16.707 3.293a1 1 0 010 1.414L15.414 6l1.293 1.293a1 1 0 01-1.414 1.414L14 7.414l-1.293 1.293a1 1 0 11-1.414-1.414L12.586 6l-1.293-1.293a1 1 0 011.414-1.414L14 4.586l1.293-1.293a1 1 0 011.414 0z"/>
                    </svg>
                    Akhiri Panggilan
                </button>
            </div>
            
            <!-- Emergency Message -->
            <div class="mt-6 p-4 bg-white bg-opacity-10 backdrop-blur-md rounded-xl">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-yellow-300 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <div class="text-white text-sm">
                        <p class="font-medium mb-1">Anda tidak sendirian.</p>
                        <p class="text-white text-opacity-80">Tim profesional SoulCare siap membantu Anda 24/7. Bicaralah dengan tenang dan jujur tentang perasaan Anda.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="mt-6 grid grid-cols-2 gap-4">
            <button class="bg-white bg-opacity-10 backdrop-blur-md text-white p-4 rounded-xl text-center hover:bg-opacity-20 transition-all duration-300">
                <svg class="w-6 h-6 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
                <span class="text-sm">Chat Darurat</span>
            </button>
            
            <button class="bg-white bg-opacity-10 backdrop-blur-md text-white p-4 rounded-xl text-center hover:bg-opacity-20 transition-all duration-300">
                <svg class="w-6 h-6 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span class="text-sm">Lokasi Terdekat</span>
            </button>
        </div>
    </div>
    
    <script>
        let startTime = Date.now();
        let timerInterval;
        let isConnected = false;
        
        // Start call timer
        function startTimer() {
            timerInterval = setInterval(() => {
                const elapsed = Math.floor((Date.now() - startTime) / 1000);
                const minutes = Math.floor(elapsed / 60);
                const seconds = elapsed % 60;
                document.getElementById('callTimer').textContent = 
                    `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            }, 1000);
        }
        
        // Simulate call connection
        function simulateConnection() {
            setTimeout(() => {
                isConnected = true;
                document.getElementById('callStatus').textContent = 'Terhubung';
                document.getElementById('audioWave').style.display = 'flex';
                startTimer();
                
                // Show success message
                showNotification('Panggilan terhubung dengan konselor darurat', 'success');
            }, 3000);
        }
        
        // End call function
        function endCall() {
            if (timerInterval) {
                clearInterval(timerInterval);
            }
            
            // Show ending message
            showNotification('Panggilan berakhir. Kembali ke Hope Scan...', 'info');
            
            // Simulate navigation back to hope scan
            setTimeout(() => {
                // In a real application, this would navigate to the hope scan page
                // For demonstration, we'll show an alert
                alert('Mengarahkan kembali ke halaman Hope Scan...');
                window.location.href = '/hope_scan';
            }, 1500);
        }
        
        // Show notification
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 ${
                type === 'success' ? 'bg-green-500 text-white' :
                type === 'error' ? 'bg-red-500 text-white' :
                'bg-blue-500 text-white'
            }`;
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            // Slide in
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            // Slide out and remove
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
        
        // Mute toggle
        document.getElementById('muteBtn').addEventListener('click', function() {
            this.classList.toggle('bg-red-500');
            const isMuted = this.classList.contains('bg-red-500');
            if (isMuted) {
                this.innerHTML = '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.617.814L4.382 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.382l4.001-3.814a1 1 0 011.617.076zM12.293 7.293a1 1 0 011.414 0L15 8.586l1.293-1.293a1 1 0 111.414 1.414L16.414 10l1.293 1.293a1 1 0 01-1.414 1.414L15 11.414l-1.293 1.293a1 1 0 01-1.414-1.414L13.586 10l-1.293-1.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>';
                showNotification('Mikrofon dimatikan', 'info');
            } else {
                this.innerHTML = '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z" clip-rule="evenodd"/></svg>';
                showNotification('Mikrofon dinyalakan', 'info');
            }
        });
        
        // Speaker toggle
        document.getElementById('speakerBtn').addEventListener('click', function() {
            this.classList.toggle('bg-blue-500');
            const isSpeakerOn = this.classList.contains('bg-blue-500');
            showNotification(isSpeakerOn ? 'Speaker dinyalakan' : 'Speaker dimatikan', 'info');
        });
        
        // Initialize call
        document.addEventListener('DOMContentLoaded', function() {
            simulateConnection();
            showNotification('Menghubungi layanan darurat...', 'info');
        });
        
        // Prevent accidental page refresh
        window.addEventListener('beforeunload', function(e) {
            if (isConnected) {
                e.preventDefault();
                e.returnValue = '';
            }
        });
    </script>
</body>
</html>