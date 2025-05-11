@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-r from-purple-100 to-blue-100 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('ai-chats.index') }}" class="flex items-center text-purple-700 hover:text-purple-900 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Kembali ke Chat
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="border-b px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-purple-500 flex items-center justify-center text-white">
                            AI
                        </div>
                        <div class="ml-4">
                            <h2 class="text-lg font-semibold text-gray-800">Chat #{{ $chatId ?? '12345' }}</h2>
                            <p class="text-sm text-gray-500">Tanggal: {{ date('d M Y, H:i') }}</p>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 py-1 px-3 rounded-md text-sm flex items-center transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Unduh
                        </button>
                        <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 py-1 px-3 rounded-md text-sm flex items-center transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2" />
                            </svg>
                            Salin
                        </button>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <!-- Riwayat Chat -->
                <div class="space-y-6">
                    <!-- Pesan AI -->
                    <div class="flex">
                        <div class="w-8 h-8 rounded-full bg-purple-500 flex items-center justify-center text-white mr-3 flex-shrink-0">
                            AI
                        </div>
                        <div class="bg-purple-50 rounded-lg rounded-tl-none p-4 max-w-3xl">
                            <p class="text-gray-700">Halo! Selamat datang di SoulCare AI Chat. Saya di sini untuk mendengarkan dan membantu Anda dengan masalah kesehatan mental. Bagaimana perasaan Anda hari ini?</p>
                            <span class="text-xs text-gray-500 mt-2 block">09:30</span>
                        </div>
                    </div>

                    <!-- Pesan User -->
                    <div class="flex justify-end">
                        <div class="bg-blue-50 rounded-lg rounded-tr-none p-4 max-w-3xl">
                            <p class="text-gray-700">Halo, saya merasa sangat cemas belakangan ini. Saya tidak bisa tidur dengan nyenyak dan sulit berkonsentrasi pada pekerjaan saya. Apakah Anda punya saran untuk mengurangi kecemasan?</p>
                            <span class="text-xs text-gray-500 mt-2 block">09:32</span>
                        </div>
                        <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white ml-3 flex-shrink-0">
                            Anda
                        </div>
                    </div>

                    <!-- Pesan AI -->
                    <div class="flex">
                        <div class="w-8 h-8 rounded-full bg-purple-500 flex items-center justify-center text-white mr-3 flex-shrink-0">
                            AI
                        </div>
                        <div class="bg-purple-50 rounded-lg rounded-tl-none p-4 max-w-3xl">
                            <p class="text-gray-700">Saya mengerti Anda sedang mengalami kecemasan. Ini adalah perasaan yang sangat umum dan ada beberapa teknik yang dapat membantu:</p>
                            <ul class="list-disc pl-5 mt-2 space-y-1 text-gray-700">
                                <li>Latihan pernapasan dalam - cobalah menarik napas perlahan selama 4 hitungan, tahan selama 4 hitungan, dan hembuskan selama 6 hitungan. Ulangi 5-10 kali.</li>
                                <li>Mindfulness meditation - luangkan waktu 5-10 menit setiap hari untuk duduk tenang dan fokus pada pernapasan Anda.</li>
                                <li>Aktivitas fisik - bahkan berjalan 20 menit sehari dapat membantu mengurangi kecemasan.</li>
                                <li>Batasi kafein dan alkohol - keduanya dapat memperburuk gejala kecemasan.</li>
                                <li>Prioritaskan tidur yang cukup - cobalah untuk menciptakan rutinitas tidur yang konsisten.</li>
                            </ul>
                            <p class="mt-3 text-gray-700">Apakah Anda sudah mencoba salah satu teknik ini? Atau apakah Anda ingin informasi lebih lanjut tentang metode tertentu?</p>
                            <span class="text-xs text-gray-500 mt-2 block">09:35</span>
                        </div>
                    </div>

                    <!-- Pesan User -->
                    <div class="flex justify-end">
                        <div class="bg-blue-50 rounded-lg rounded-tr-none p-4 max-w-3xl">
                            <p class="text-gray-700">Saya telah mencoba latihan pernapasan, tetapi sulit untuk fokus. Bisakah Anda menjelaskan lebih detail tentang mindfulness meditation? Bagaimana cara memulainya?</p>
                            <span class="text-xs text-gray-500 mt-2 block">09:38</span>
                        </div>
                        <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white ml-3 flex-shrink-0">
                            Anda
                        </div>
                    </div>

                    <!-- Pesan AI -->
                    <div class="flex">
                        <div class="w-8 h-8 rounded-full bg-purple-500 flex items-center justify-center text-white mr-3 flex-shrink-0">
                            AI
                        </div>
                        <div class="bg-purple-50 rounded-lg rounded-tl-none p-4 max-w-3xl">
                            <p class="text-gray-700">Tentu, saya akan menjelaskan lebih detail tentang mindfulness meditation. Ini adalah panduan langkah demi langkah untuk pemula:</p>
                            
                            <div class="bg-white rounded-lg p-4 border border-gray-200 my-3">
                                <h3 class="font-medium text-purple-700 mb-2">Panduan Mindfulness Meditation untuk Pemula</h3>
                                <ol class="list-decimal pl-5 space-y-2 text-gray-700">
                                    <li><strong>Cari tempat yang tenang</strong> - Pilih ruangan atau area di mana Anda tidak akan terganggu selama 5-10 menit.</li>
                                    <li><strong>Posisi yang nyaman</strong> - Duduk dengan punggung tegak namun rileks, baik di lantai dengan bantal atau di kursi.</li>
                                    <li><strong>Atur timer</strong> - Mulai dengan 5 menit dan tingkatkan durasinya secara bertahap.</li>
                                    <li><strong>Perhatikan pernapasan Anda</strong> - Fokus pada sensasi udara masuk dan keluar dari tubuh Anda.</li>
                                    <li><strong>Saat pikiran Anda mengembara</strong> - Jangan marah pada diri sendiri, cukup sadari bahwa pikiran Anda telah mengembara dan dengan lembut kembalikan fokus ke pernapasan.</li>
                                    <li><strong>Konsistensi adalah kunci</strong> - Cobalah berlatih setiap hari, sebaiknya pada waktu yang sama.</li>
                                </ol>
                            </div>
                            
                            <p class="text-gray-700">Ada juga banyak aplikasi yang dapat membantu Anda memulai, seperti Headspace, Calm, atau Insight Timer. Mereka menawarkan meditasi terpandu yang sangat membantu untuk pemula.</p>
                            
                            <p class="mt-3 text-gray-700">Apakah Anda memiliki pertanyaan spesifik tentang mindfulness atau ingin tahu tentang strategi lain untuk mengelola kecemasan?</p>
                            
                            <span class="text-xs text-gray-500 mt-2 block">09:42</span>
                        </div>
                    </div>

                    <!-- Form Reply -->
                    <div class="mt-8 border-t pt-6">
                        <h3 class="text-lg font-medium text-gray-800 mb-4">Balas Percakapan</h3>
                        <form>
                            <div class="mb-4">
                                <textarea rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" 
                                    placeholder="Ketik balasan Anda di sini..."></textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-2 px-6 rounded-lg transition duration-300 flex items-center">
                                    <span>Kirim Balasan</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Sumber Daya Tambahan</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="#" class="block p-4 border rounded-lg hover:bg-purple-50 transition">
                        <h3 class="font-medium text-purple-700">Artikel: Mengatasi Kecemasan</h3>
                        <p class="text-sm text-gray-600 mt-1">Pelajari strategi berbasis bukti untuk mengelola kecemasan dalam kehidupan sehari-hari.</p>
                    </a>
                    <a href="#" class="block p-4 border rounded-lg hover:bg-purple-50 transition">
                        <h3 class="font-medium text-purple-700">Video: Teknik Relaksasi</h3>
                        <p class="text-sm text-gray-600 mt-1">Panduan visual tentang berbagai teknik relaksasi yang dapat Anda praktikkan sendiri.</p>
                    </a>
                    <a href="#" class="block p-4 border rounded-lg hover:bg-purple-50 transition">
                        <h3 class="font-medium text-purple-700">Konsultasi dengan Psikolog</h3>
                        <p class="text-sm text-gray-600 mt-1">Jadwalkan sesi konsultasi dengan psikolog profesional kami.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection