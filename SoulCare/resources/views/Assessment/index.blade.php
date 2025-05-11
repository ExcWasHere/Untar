@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-r from-green-100 to-blue-100 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-green-800 mb-2">Asesmen Kesehatan Mental</h1>
            <p class="text-lg text-gray-600">Evaluasi kesehatan mental Anda dengan alat penilaian standar</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Kartu Asesmen Kecemasan -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="h-3 bg-blue-500"></div>
                <div class="p-6">
                    <div class="flex items-center justify-center mb-4">
                        <div class="p-3 rounded-full bg-blue-100">
                            <svg class="h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800 text-center mb-2">Asesmen Kecemasan</h2>
                    <p class="text-gray-600 mb-4">Penilaian standar untuk mengevaluasi tingkat kecemasan dengan menggunakan GAD-7 (Generalized Anxiety Disorder Assessment).</p>
                    <ul class="mb-4 text-gray-600">
                        <li class="flex items-center mb-1">
                            <svg class="h-4 w-4 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Waktu: 5 menit
                        </li>
                        <li class="flex items-center mb-1">
                            <svg class="h-4 w-4 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            7 pertanyaan
                        </li>
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Hasil instan
                        </li>
                    </ul>
                    <a href="{{ route('assessments.start', ['type' => 'anxiety']) }}" class="block w-full bg-blue-500 hover:bg-blue-600 text-white text-center py-2 rounded-lg transition duration-300">
                        Mulai Asesmen
                    </a>
                </div>
            </div>

            <!-- Kartu Asesmen Depresi -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="h-3 bg-purple-500"></div>
                <div class="p-6">
                    <div class="flex items-center justify-center mb-4">
                        <div class="p-3 rounded-full bg-purple-100">
                            <svg class="h-8 w-8 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800 text-center mb-2">Asesmen Depresi</h2>
                    <p class="text-gray-600 mb-4">Penilaian standar untuk mengevaluasi tingkat depresi dengan menggunakan PHQ-9 (Patient Health Questionnaire).</p>
                    <ul class="mb-4 text-gray-600">
                        <li class="flex items-center mb-1">
                            <svg class="h-4 w-4 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Waktu: 5-10 menit
                        </li>
                        <li class="flex items-center mb-1">
                            <svg class="h-4 w-4 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            9 pertanyaan
                        </li>
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Hasil instan
                        </li>
                    </ul>
                    <a href="{{ route('assessments.start', ['type' => 'depression']) }}" class="block w-full bg-purple-500 hover:bg-purple-600 text-white text-center py-2 rounded-lg transition duration-300">
                        Mulai Asesmen
                    </a>
                </div>
            </div>

            <!-- Kartu Asesmen Stress -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="h-3 bg-green-500"></div>
                <div class="p-6">
                    <div class="flex items-center justify-center mb-4">
                        <div class="p-3 rounded-full bg-green-100">
                            <svg class="h-8 w-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800 text-center mb-2">Asesmen Stres</h2>
                    <p class="text-gray-600 mb-4">Penilaian standar untuk mengevaluasi tingkat stres dengan menggunakan PSS (Perceived Stress Scale).</p>
                    <ul class="mb-4 text-gray-600">
                        <li class="flex items-center mb-1">
                            <svg class="h-4 w-4 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Waktu: 5-10 menit
                        </li>
                        <li class="flex items-center mb-1">
                            <svg class="h-4 w-4 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            10 pertanyaan
                        </li>
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Hasil instan
                        </li>
                    </ul>
                    <a href="{{ route('assessments.start', ['type' => 'stress']) }}" class="block w-full bg-green-500 hover:bg-green-600 text-white text-center py-2 rounded-lg transition duration-300">
                        Mulai Asesmen
                    </a>
                </div>
            </div>
        </div>

        <!-- Riwayat Asesmen -->
        <div class="mt-12 bg-white rounded-xl shadow-md overflow-hidden">
            <div class="border-b px-6 py-4">
                <h2 class="text-xl font-semibold text-gray-800">Riwayat Asesmen Anda</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Asesmen</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Skor</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hasil</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10 Mei 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Kecemasan</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">8/21</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Kecemasan Sedang</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-blue-600 hover:text-blue-900">Lihat Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">8 Mei 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">Depresi</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">5/27</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Depresi Ringan</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-blue-600 hover:text-blue-900">Lihat Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">5 Mei 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Stres</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">18/40</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Stres Sedang</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-blue-600 hover:text-blue-900">Lihat Detail</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Info Panel -->
        <div class="mt-12 bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Tentang Asesmen Kesehatan Mental</h2>
                <div class="prose max-w-none text-gray-600">
                    <p>Asesmen yang tersedia di SoulCare dirancang untuk memberikan penilaian awal tentang kesehatan mental Anda. Penting untuk diingat bahwa:</p>
                    <ul>
                        <li>Hasil asesmen tidak menggantikan diagnosis klinis oleh profesional kesehatan mental.</li>
                        <li>Asesmen ini dimaksudkan sebagai alat skrining dan hanya memberikan indikasi tingkat keparahan gejala.</li>
                        <li>Semua data yang Anda berikan bersifat anonim dan dilindungi kerahasiaannya.</li>
                        <li>Jika Anda mengalami gejala kesehatan mental yang mengganggu, kami sangat menyarankan Anda untuk berkonsultasi dengan profesional kesehatan mental.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection