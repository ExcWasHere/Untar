<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoulCare - Hope Scan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <style>
        .progress-bar {
            transition: width 1.5s ease-in-out;
        }
    </style>
</head>
<body class="bg-purple-100">
    <div class="min-h-screen flex">
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
                <a href="/release_emotion" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span>Release your emotion</span>
                </a>
                <a href="/hope_scan" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg bg-white">
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
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-purple-900">Hope Scan</h1>
                    <p class="text-purple-600">Deteksi dini risiko bunuh diri</p>
                </div>
                
                <div class="flex items-center">
                    <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg flex items-center mr-4">
                        <span class="mr-2">🔔</span>
                        <span>Notifikasi</span>
                    </button>
                    
                    <div class="relative">
                        <button class="bg-purple-100 hover:bg-purple-200 border border-purple-300 px-4 py-2 rounded-lg flex items-center">
                            <span>Excell</span>
                            <span class="ml-2">▼</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Risk Score Card -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-purple-900">Skor Risiko Saat Ini</h2>
                    <div class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full font-medium">
                        Perhatian
                    </div>
                </div>
                
                <div class="flex items-center mb-4">
                    <div class="w-full mr-4">
                        <div class="h-4 bg-gray-200 rounded-full">
                            <div class="h-4 bg-yellow-500 rounded-full progress-bar" style="width: 65%"></div>
                        </div>
                    </div>
                    <div class="w-16 text-center">
                        <span class="text-2xl font-bold">65</span>
                        <span class="text-gray-500 text-sm">/100</span>
                    </div>
                </div>
                
                <div class="grid grid-cols-5 gap-4 text-center text-sm">
                    <div class="bg-green-100 p-2 rounded-lg">0-20<br>Stabil</div>
                    <div class="bg-green-200 p-2 rounded-lg">21-40<br>Baik</div>
                    <div class="bg-yellow-100 p-2 rounded-lg">41-60<br>Waspada</div>
                    <div class="bg-yellow-200 p-2 rounded-lg font-medium ring-2 ring-yellow-500">61-80<br>Perhatian</div>
                    <div class="bg-red-100 p-2 rounded-lg">81-100<br>Kritis</div>
                </div>
            </div>
            
            <!-- Risk Factor Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-md p-5">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-purple-900">Emosi Negatif</h3>
                        <span class="text-red-500 text-2xl font-bold">75%</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">7 hari terakhir</p>
                    <div class="mt-3 h-2 bg-gray-200 rounded-full">
                        <div class="h-2 bg-red-500 rounded-full" style="width: 75%"></div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-5">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-purple-900">Mood Rendah</h3>
                        <span class="text-orange-500 text-2xl font-bold">60%</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">7 hari terakhir</p>
                    <div class="mt-3 h-2 bg-gray-200 rounded-full">
                        <div class="h-2 bg-orange-500 rounded-full" style="width: 60%"></div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-5">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-purple-900">Interaksi Sosial</h3>
                        <span class="text-yellow-500 text-2xl font-bold">40%</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">7 hari terakhir</p>
                    <div class="mt-3 h-2 bg-gray-200 rounded-full">
                        <div class="h-2 bg-yellow-500 rounded-full" style="width: 40%"></div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-5">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-purple-900">Pola Tidur</h3>
                        <span class="text-red-500 text-2xl font-bold">80%</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">7 hari terakhir</p>
                    <div class="mt-3 h-2 bg-gray-200 rounded-full">
                        <div class="h-2 bg-red-500 rounded-full" style="width: 80%"></div>
                    </div>
                </div>
            </div>
            
            <!-- Charts and Details Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Emotion Trend Chart -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="font-bold text-purple-900 mb-4">Tren Emosi (30 Hari Terakhir)</h3>
                    <div class="h-64">
                        <canvas id="emotionChart"></canvas>
                    </div>
                </div>
                
                <!-- Risk Factors Analysis -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="font-bold text-purple-900 mb-4">Analisis Faktor Risiko</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">Perubahan emosi drastis</span>
                                <span class="text-sm font-medium text-red-600">Tinggi</span>
                            </div>
                            <div class="h-2 bg-gray-200 rounded-full">
                                <div class="h-2 bg-red-500 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">Kurangnya dukungan sosial</span>
                                <span class="text-sm font-medium text-yellow-600">Sedang</span>
                            </div>
                            <div class="h-2 bg-gray-200 rounded-full">
                                <div class="h-2 bg-yellow-500 rounded-full" style="width: 50%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">Perasaan putus asa</span>
                                <span class="text-sm font-medium text-red-600">Tinggi</span>
                            </div>
                            <div class="h-2 bg-gray-200 rounded-full">
                                <div class="h-2 bg-red-500 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">Penurunan minat aktivitas</span>
                                <span class="text-sm font-medium text-yellow-600">Sedang</span>
                            </div>
                            <div class="h-2 bg-gray-200 rounded-full">
                                <div class="h-2 bg-yellow-500 rounded-full" style="width: 60%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">Gangguan pola tidur</span>
                                <span class="text-sm font-medium text-red-600">Tinggi</span>
                            </div>
                            <div class="h-2 bg-gray-200 rounded-full">
                                <div class="h-2 bg-red-500 rounded-full" style="width: 80%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recommendations and Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <div class="lg:col-span-2 bg-white rounded-xl shadow-md p-6">
                    <h3 class="font-bold text-purple-900 mb-4">Rekomendasi</h3>
                    
                    <div class="space-y-4">
                        <div class="bg-blue-50 border-l-4 border-blue-500 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-blue-800">Jadwalkan Konsultasi</h3>
                                    <div class="mt-2 text-sm text-blue-700">
                                        <p>Berdasarkan hasil analisis, kami merekomendasikan untuk segera melakukan konsultasi dengan konselor. Skor risiko Anda memerlukan perhatian profesional.</p>
                                    </div>
                                    <div class="mt-3">
                                        <a class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm" href="/consultation">Jadwalkan Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <span class="bg-purple-100 text-purple-800 flex items-center justify-center h-6 w-6 rounded-full mr-2">1</span>
                                <div>
                                    <h4 class="font-medium">Latihan Pernapasan</h4>
                                    <p class="text-sm text-gray-600">Lakukan latihan pernapasan dalam 5-10 menit, 3x sehari untuk mengurangi kecemasan.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <span class="bg-purple-100 text-purple-800 flex items-center justify-center h-6 w-6 rounded-full mr-2">2</span>
                                <div>
                                    <h4 class="font-medium">Hubungi Teman Dekat</h4>
                                    <p class="text-sm text-gray-600">Tingkatkan interaksi sosial melalui percakapan ringan dengan orang terdekat.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <span class="bg-purple-100 text-purple-800 flex items-center justify-center h-6 w-6 rounded-full mr-2">3</span>
                                <div>
                                    <h4 class="font-medium">Rutinkan Waktu Tidur</h4>
                                    <p class="text-sm text-gray-600">Tetapkan jadwal tidur yang konsisten untuk memperbaiki pola tidur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="font-bold text-purple-900 mb-4">Kontak Darurat</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center p-3 bg-red-50 rounded-lg">
                            <div class="bg-red-100 p-2 rounded-full mr-3">
                                <svg class="h-6 w-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium">Hotline Nasional</p>
                                <p class="text-lg font-bold">119</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center p-3 bg-purple-50 rounded-lg">
                            <div class="bg-purple-100 p-2 rounded-full mr-3">
                                <svg class="h-6 w-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium">Konselor Utama</p>
                                <p class="text-lg font-bold">Dr. Amelia Sari</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center p-3 bg-green-50 rounded-lg">
                            <div class="bg-green-100 p-2 rounded-full mr-3">
                                <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium">Grup Dukungan</p>
                                <p class="text-lg font-bold">Komunitas Peduli</p>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <a href="/emergency-call" class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg flex items-center justify-center">
                                <span class="mr-2">❗</span>
                                <span>Bantuan Darurat</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Daily Mood and Journal -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-purple-900">Catatan Harian</h2>
                    <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg">
                        + Tambah Catatan
                    </button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="font-medium text-purple-900 mb-3">Mood Harian</h3>
                        <div class="grid grid-cols-7 gap-2 text-center">
                            <div>
                                <div class="bg-red-100 rounded-lg p-2 mb-1">😢</div>
                                <div class="text-xs">Sen</div>
                            </div>
                            <div>
                                <div class="bg-orange-100 rounded-lg p-2 mb-1">😔</div>
                                <div class="text-xs">Sel</div>
                            </div>
                            <div>
                                <div class="bg-yellow-100 rounded-lg p-2 mb-1">😐</div>
                                <div class="text-xs">Rab</div>
                            </div>
                            <div>
                                <div class="bg-green-100 rounded-lg p-2 mb-1">🙂</div>
                                <div class="text-xs">Kam</div>
                            </div>
                            <div>
                                <div class="bg-orange-100 rounded-lg p-2 mb-1">😔</div>
                                <div class="text-xs">Jum</div>
                            </div>
                            <div>
                                <div class="bg-red-100 rounded-lg p-2 mb-1">😢</div>
                                <div class="text-xs">Sab</div>
                            </div>
                            <div>
                                <div class="bg-gray-100 rounded-lg p-2 mb-1">❓</div>
                                <div class="text-xs">Min</div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-purple-900 mb-3">Entri Jurnal Terbaru</h3>
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex justify-between items-center mb-2">
                                <div class="font-medium">Kemarin, 21:45</div>
                                <div class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Emosi Negatif</div>
                            </div>
                            <p class="text-gray-600 text-sm">Hari ini sangat berat. Saya merasa lelah dan sendirian. Sepertinya tidak ada yang memahami apa yang saya rasakan. Saya mencoba untuk tetap positif tapi sulit rasanya...</p>
                            <button class="mt-3 text-purple-600 hover:text-purple-800 text-sm font-medium">Lihat Selengkapnya →</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center text-gray-500 text-sm">
                © 2025 SoulCare. Hak Cipta Dilindungi.
            </div>
        </div>
    </div>
    
    <script>
        // Dummy data for emotion chart
        const emotionData = {
            labels: ['15 Apr', '16 Apr', '17 Apr', '18 Apr', '19 Apr', '20 Apr', '21 Apr', '22 Apr', '23 Apr', '24 Apr', '25 Apr', '26 Apr', '27 Apr', '28 Apr', '29 Apr', '30 Apr', '1 Mei', '2 Mei', '3 Mei', '4 Mei', '5 Mei', '6 Mei', '7 Mei', '8 Mei', '9 Mei', '10 Mei', '11 Mei', '12 Mei', '13 Mei', '14 Mei'],
            datasets: [
                {
                    label: 'Emosi Positif',
                    data: [45, 40, 30, 35, 25, 20, 15, 25, 30, 35, 40, 45, 40, 30, 25, 20, 15, 10, 15, 20, 25, 30, 25, 20, 15, 20, 25, 30, 35, 40],
                    borderColor: 'rgb(34, 197, 94)',
                    backgroundColor: 'rgba(34, 197, 94, 0.2)',
                    tension: 0.4,
                    fill: true
                },
                {
                    label: 'Emosi Negatif',
                    data: [55, 60, 70, 65, 75, 80, 85, 75, 70, 65, 60, 55, 60, 70, 75, 80, 85, 90, 85, 80, 75, 70, 75, 80, 85, 80, 75, 70, 65, 60],
                    borderColor: 'rgb(239, 68, 68)',
                    backgroundColor: 'rgba(239, 68, 68, 0.2)',
                    tension: 0.4,
                    fill: true
                }
            ]
        };
        
        // Initialize charts
        window.addEventListener('DOMContentLoaded', () => {
            const emotionCtx = document.getElementById('emotionChart').getContext('2d');
            new Chart(emotionCtx, {
                type: 'line',
                data: emotionData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            title: {
                                display: true,
                                text: 'Persentase (%)'
                            }
                        },
                        x: {
                            ticks: {
                                maxRotation: 0,
                                autoSkip: true,
                                maxTicksLimit: 10
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    }
                }
            });
        });
        
        // Calculate risk score algorithm (dummy implementation)
        function calculateRiskScore() {
            // In a real implementation, this would use actual user data
            const emotionalNegativeScore = 75;
            const lowMoodScore = 60;
            const socialInteractionScore = 40;
            const sleepPatternScore = 80;
            
            // Weighted average calculation
            const riskScore = Math.round(
                (emotionalNegativeScore * 0.35) + 
                (lowMoodScore * 0.25) + 
                (socialInteractionScore * 0.15) + 
                (sleepPatternScore * 0.25)
            );
            
            return riskScore;
        }
        
        // Get risk level based on score
        function getRiskLevel(score) {
            if (score >= 81) return 'Kritis';
            if (score >= 61) return 'Perhatian';
            if (score >= 41) return 'Waspada';
            if (score >= 21) return 'Baik';
            return 'Stabil';
        }
    </script>
</body>
</html>