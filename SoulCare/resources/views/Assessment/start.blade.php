@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-r from-green-100 to-blue-100 min-h-screen py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('assessments.index') }}" class="flex items-center text-green-700 hover:text-green-900 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Kembali ke Daftar Asesmen
            </a>
        </div>

        <!-- Header -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-green-500 to-blue-500 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">{{ $type ?? 'Kecemasan' }} Assessment</h1>
            </div>
            <div class="p-6">
                <div class="flex items-center mb-4">
                    @if(($type ?? 'anxiety') == 'anxiety')
                    <div class="p-2 rounded-full bg-blue-100 mr-4">
                        <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">GAD-7 (Generalized Anxiety Disorder Assessment)</h2>
                        <p class="text-gray-600">Sebuah alat skrining untuk mengevaluasi tingkat kecemasan</p>
                    </div>
                    @elseif(($type ?? '') == 'depression')
                    <div class="p-2 rounded-full bg-purple-100 mr-4">
                        <svg class="h-6 w-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">PHQ-9 (Patient Health Questionnaire)</h2>
                        <p class="text-gray-600">Sebuah alat skrining untuk mengevaluasi tingkat depresi</p>
                    </div>
                    @elseif(($type ?? '') == 'stress')
                    <div class="p-2 rounded-full bg-green-100 mr-4">
                        <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">PSS (Perceived Stress Scale)</h2>
                        <p class="text-gray-600">Sebuah alat skrining untuk mengevaluasi tingkat stres</p>
                    </div>
                    @endif
                </div>
                <div class="text-gray-600">
                    <p class="mb-4">Silakan jawab setiap pertanyaan dengan jujur mengenai perasaan Anda selama 2 minggu terakhir. Tidak ada jawaban yang benar atau salah.</p>
                    <p class="mb-4">Semua informasi yang Anda berikan akan dirahasiakan dan hanya digunakan untuk membantu Anda lebih memahami kesehatan mental Anda saat ini.</p>
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">
                                    Penting: Asesmen ini tidak menggantikan diagnosis profesional. Jika Anda mengalami gejala berat, segera konsultasikan dengan profesional kesehatan mental.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Asesmen -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6">
                <form action="{{ route('assessments.submit', ['type' => $type ?? 'anxiety']) }}" method="POST">
                    @csrf
                    <div class="space-y-6">
                        @if(($type ?? 'anxiety') == 'anxiety')
                        <!-- Pertanyaan GAD-7 -->
                        <div class="mb-8">
                            <p class="font-medium text-lg text-gray-800 mb-4">Selama 2 minggu terakhir, seberapa sering Anda terganggu oleh masalah-masalah berikut?</p>
                            
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead>
                                        <tr>
                                            <th class="py-3 text-left text-sm font-medium text-gray-500 w-1/2">Masalah</th>
                                            <th class="py-3 text-center text-sm font-medium text-gray-500">Tidak sama sekali</th>
                                            <th class="py-3 text-center text-sm font-medium text-gray-500">Beberapa hari</th>
                                            <th class="py-3 text-center text-sm font-medium text-gray-500">Lebih dari setengah hari</th>
                                            <th class="py-3 text-center text-sm font-medium text-gray-500">Hampir setiap hari</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">1. Merasa gugup, cemas, atau tegang</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q1" value="0" class="h-4 w-4 text-blue-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q1" value="1" class="h-4 w-4 text-blue-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q1" value="2" class="h-4 w-4 text-blue-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q1" value="3" class="h-4 w-4 text-blue-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">2. Tidak mampu berhenti atau mengendalikan kekhawatiran</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q2" value="0" class="h-4 w-4 text-blue-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q2" value="1" class="h-4 w-4 text-blue-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q2" value="2" class="h-4 w-4 text-blue-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q2" value="3" class="h-4 w-4 text-blue-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">3. Terlalu khawatir tentang berbagai hal</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q3" value="0" class="h-4 w-4 text-blue-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q3" value="1" class="h-4 w-4 text-blue-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q3" value="2" class="h-4 w-4 text-blue-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q3" value="3" class="h-4 w-4 text-blue-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">4. Sulit untuk rileks</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q4" value="0" class="h-4 w-4 text-blue-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q4" value="1" class="h-4 w-4 text-blue-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q4" value="1" class="h-4 w-4 text-blue-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q4" value="2" class="h-4 w-4 text-blue-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q4" value="3" class="h-4 w-4 text-blue-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">5. Sangat gelisah sehingga sulit untuk duduk diam</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q5" value="0" class="h-4 w-4 text-blue-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q5" value="1" class="h-4 w-4 text-blue-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q5" value="2" class="h-4 w-4 text-blue-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q5" value="3" class="h-4 w-4 text-blue-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">6. Mudah menjadi kesal atau marah</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q6" value="0" class="h-4 w-4 text-blue-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q6" value="1" class="h-4 w-4 text-blue-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q6" value="2" class="h-4 w-4 text-blue-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q6" value="3" class="h-4 w-4 text-blue-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">7. Merasa takut seolah-olah sesuatu yang mengerikan mungkin terjadi</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q7" value="0" class="h-4 w-4 text-blue-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q7" value="1" class="h-4 w-4 text-blue-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q7" value="2" class="h-4 w-4 text-blue-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q7" value="3" class="h-4 w-4 text-blue-600">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @elseif(($type ?? '') == 'depression')
                        <!-- Pertanyaan PHQ-9 -->
                        <div class="mb-8">
                            <p class="font-medium text-lg text-gray-800 mb-4">Selama 2 minggu terakhir, seberapa sering Anda terganggu oleh masalah-masalah berikut?</p>
                            
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead>
                                        <tr>
                                            <th class="py-3 text-left text-sm font-medium text-gray-500 w-1/2">Masalah</th>
                                            <th class="py-3 text-center text-sm font-medium text-gray-500">Tidak sama sekali</th>
                                            <th class="py-3 text-center text-sm font-medium text-gray-500">Beberapa hari</th>
                                            <th class="py-3 text-center text-sm font-medium text-gray-500">Lebih dari setengah hari</th>
                                            <th class="py-3 text-center text-sm font-medium text-gray-500">Hampir setiap hari</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">1. Sedikit minat atau kesenangan dalam melakukan hal-hal</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q1" value="0" class="h-4 w-4 text-purple-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q1" value="1" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q1" value="2" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q1" value="3" class="h-4 w-4 text-purple-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">2. Merasa sedih, tertekan, atau putus asa</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q2" value="0" class="h-4 w-4 text-purple-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q2" value="1" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q2" value="2" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q2" value="3" class="h-4 w-4 text-purple-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">3. Kesulitan tidur atau tidur terlalu banyak</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q3" value="0" class="h-4 w-4 text-purple-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q3" value="1" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q3" value="2" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q3" value="3" class="h-4 w-4 text-purple-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">4. Merasa lelah atau memiliki sedikit energi</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q4" value="0" class="h-4 w-4 text-purple-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q4" value="1" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q4" value="2" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q4" value="3" class="h-4 w-4 text-purple-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">5. Nafsu makan yang buruk atau makan berlebihan</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q5" value="0" class="h-4 w-4 text-purple-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q5" value="1" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q5" value="2" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q5" value="3" class="h-4 w-4 text-purple-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">6. Merasa buruk tentang diri sendiri atau merasa bahwa Anda gagal atau mengecewakan diri sendiri atau keluarga Anda</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q6" value="0" class="h-4 w-4 text-purple-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q6" value="1" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q6" value="2" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q6" value="3" class="h-4 w-4 text-purple-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">7. Kesulitan berkonsentrasi pada hal-hal seperti membaca koran atau menonton televisi</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q7" value="0" class="h-4 w-4 text-purple-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q7" value="1" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q7" value="2" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q7" value="3" class="h-4 w-4 text-purple-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">8. Bergerak atau berbicara begitu lambat sehingga orang lain dapat memperhatikannya. Atau sebaliknya, sangat gelisah atau aktif sehingga Anda bergerak lebih banyak dari biasanya</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q8" value="0" class="h-4 w-4 text-purple-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q8" value="1" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q8" value="2" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q8" value="3" class="h-4 w-4 text-purple-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">9. Pikiran bahwa Anda lebih baik mati atau menyakiti diri sendiri dengan cara tertentu</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q9" value="0" class="h-4 w-4 text-purple-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q9" value="1" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q9" value="2" class="h-4 w-4 text-purple-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q9" value="3" class="h-4 w-4 text-purple-600">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @elseif(($type ?? '') == 'stress')
                        <!-- Pertanyaan PSS -->
                        <div class="mb-8">
                            <p class="font-medium text-lg text-gray-800 mb-4">Pertanyaan berikut ini menanyakan tentang perasaan dan pikiran Anda selama bulan terakhir. Untuk setiap pertanyaan, silakan tunjukkan seberapa sering Anda merasa atau berpikir dengan cara tertentu.</p>
                            
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead>
                                        <tr>
                                            <th class="py-3 text-left text-sm font-medium text-gray-500 w-1/2">Selama bulan terakhir, seberapa sering...</th>
                                            <th class="py-3 text-center text-sm font-medium text-gray-500">Tidak pernah</th>
                                            <th class="py-3 text-center text-sm font-medium text-gray-500">Hampir tidak pernah</th>
                                            <th class="py-3 text-center text-sm font-medium text-gray-500">Kadang-kadang</th>
                                            <th class="py-3 text-center text-sm font-medium text-gray-500">Cukup sering</th>
                                            <th class="py-3 text-center text-sm font-medium text-gray-500">Sangat sering</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">1. Anda merasa kesal karena sesuatu yang terjadi secara tidak terduga?</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q1" value="0" class="h-4 w-4 text-green-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q1" value="1" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q1" value="2" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q1" value="3" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q1" value="4" class="h-4 w-4 text-green-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">2. Anda merasa tidak mampu mengendalikan hal-hal penting dalam hidup Anda?</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q2" value="0" class="h-4 w-4 text-green-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q2" value="1" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q2" value="2" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q2" value="3" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q2" value="4" class="h-4 w-4 text-green-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">3. Anda merasa gugup dan "stres"?</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q3" value="0" class="h-4 w-4 text-green-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q3" value="1" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q3" value="2" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q3" value="3" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q3" value="4" class="h-4 w-4 text-green-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">4. Anda merasa yakin tentang kemampuan Anda untuk menangani masalah pribadi?</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q4" value="4" class="h-4 w-4 text-green-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q4" value="3" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q4" value="2" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q4" value="1" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q4" value="0" class="h-4 w-4 text-green-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">5. Anda merasa bahwa segala sesuatu berjalan sesuai keinginan Anda?</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q5" value="4" class="h-4 w-4 text-green-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q5" value="3" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q5" value="2" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q5" value="1" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q5" value="0" class="h-4 w-4 text-green-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">6. Anda merasa tidak mampu mengatasi semua hal yang harus Anda lakukan?</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q6" value="0" class="h-4 w-4 text-green-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q6" value="1" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q6" value="2" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q6" value="3" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q6" value="4" class="h-4 w-4 text-green-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">7. Anda mampu mengendalikan rasa jengkel dalam hidup Anda?</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q7" value="4" class="h-4 w-4 text-green-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q7" value="3" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q7" value="2" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q7" value="1" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q7" value="0" class="h-4 w-4 text-green-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">8. Anda merasa berada di puncak segalanya?</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q8" value="4" class="h-4 w-4 text-green-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q8" value="3" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q8" value="2" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q8" value="1" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q8" value="0" class="h-4 w-4 text-green-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">9. Anda marah karena hal-hal yang terjadi di luar kendali Anda?</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q9" value="0" class="h-4 w-4 text-green-600" required>
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q9" value="1" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q9" value="2" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q9" value="3" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q9" value="4" class="h-4 w-4 text-green-600">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 text-sm text-gray-800">10. Anda merasa kesulitan menumpuk begitu tinggi sehingga Anda tidak dapat mengatasinya?</td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q10" value="2" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q10" value="3" class="h-4 w-4 text-green-600">
                                            </td>
                                            <td class="py-4 text-center">
                                                <input type="radio" name="q10" value="4" class="h-4 w-4 text-green-600">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        <!-- Pertanyaan tambahan untuk semua jenis asesmen -->
                        <div class="mb-8">
                            <h3 class="font-medium text-lg text-gray-800 mb-4">Informasi Tambahan</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="symptoms_duration" class="block text-sm font-medium text-gray-700 mb-1">Sudah berapa lama Anda mengalami gejala-gejala ini?</label>
                                    <select id="symptoms_duration" name="symptoms_duration" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md" required>
                                        <option value="">-- Pilih durasi --</option>
                                        <option value="less_than_week">Kurang dari seminggu</option>
                                        <option value="1_2_weeks">1-2 minggu</option>
                                        <option value="2_4_weeks">2-4 minggu</option>
                                        <option value="1_3_months">1-3 bulan</option>
                                        <option value="3_6_months">3-6 bulan</option>
                                        <option value="6_12_months">6-12 bulan</option>
                                        <option value="more_than_year">Lebih dari 1 tahun</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="impact_daily" class="block text-sm font-medium text-gray-700 mb-1">Seberapa besar dampak gejala-gejala ini terhadap aktivitas sehari-hari Anda?</label>
                                    <select id="impact_daily" name="impact_daily" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md" required>
                                        <option value="">-- Pilih dampak --</option>
                                        <option value="no_impact">Tidak ada dampak sama sekali</option>
                                        <option value="slight_impact">Sedikit dampak</option>
                                        <option value="moderate_impact">Dampak sedang</option>
                                        <option value="severe_impact">Dampak berat</option>
                                        <option value="extreme_impact">Dampak ekstrem - sulit melakukan aktivitas sehari-hari</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="tried_solutions" class="block text-sm font-medium text-gray-700 mb-1">Solusi apa yang pernah Anda coba untuk mengatasi gejala-gejala ini? (Pilih semua yang sesuai)</label>
                                    <div class="mt-2 space-y-2">
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="sol_none" name="tried_solutions[]" value="none" type="checkbox" class="h-4 w-4 text-green-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="sol_none" class="font-medium text-gray-700">Belum mencoba apa-apa</label>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="sol_meditation" name="tried_solutions[]" value="meditation" type="checkbox" class="h-4 w-4 text-green-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="sol_meditation" class="font-medium text-gray-700">Meditasi atau mindfulness</label>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="sol_exercise" name="tried_solutions[]" value="exercise" type="checkbox" class="h-4 w-4 text-green-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="sol_exercise" class="font-medium text-gray-700">Olahraga teratur</label>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="sol_therapy" name="tried_solutions[]" value="therapy" type="checkbox" class="h-4 w-4 text-green-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="sol_therapy" class="font-medium text-gray-700">Konseling atau terapi</label>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="sol_medication" name="tried_solutions[]" value="medication" type="checkbox" class="h-4 w-4 text-green-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="sol_medication" class="font-medium text-gray-700">Obat-obatan</label>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="sol_lifestyle" name="tried_solutions[]" value="lifestyle" type="checkbox" class="h-4 w-4 text-green-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="sol_lifestyle" class="font-medium text-gray-700">Perubahan gaya hidup (diet, tidur, dll)</label>
                                            </div>
                                        </div>
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="sol_other" name="tried_solutions[]" value="other" type="checkbox" class="h-4 w-4 text-green-600 border-gray-300 rounded">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="sol_other" class="font-medium text-gray-700">Lainnya</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Catatan tambahan (opsional)</label>
                                    <textarea id="notes" name="notes" rows="4" class="shadow-sm block w-full focus:ring-green-500 focus:border-green-500 sm:text-sm border-gray-300 rounded-md" placeholder="Ceritakan lebih lanjut tentang apa yang Anda rasakan atau pengalaman Anda..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Selesai dan Kirim
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Informasi Tambahan -->
        <div class="mt-8 bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-blue-100 to-green-100 px-6 py-4">
                <h2 class="text-lg font-semibold text-gray-800">Informasi Penting</h2>
            </div>
            <div class="p-6 space-y-4 text-sm text-gray-600">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="ml-3">Asesmen ini hanya sebagai alat skrining awal dan bukan pengganti diagnosis medis profesional.</p>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="ml-3">Hasil akan ditunjukkan segera setelah Anda mengirimkan jawaban. Anda juga dapat melihat hasil Anda nanti di profil Anda.</p>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="ml-3">Semua data yang Anda berikan dilindungi dan dijaga kerahasiaannya sesuai dengan kebijakan privasi kami.</p>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                    </div>
                    <p class="ml-3">Jika Anda mengalami krisis atau pikiran untuk menyakiti diri sendiri, silakan segera hubungi layanan krisis di <strong>119</strong> atau <strong>1-500-454</strong> (Hotline Kementerian Kesehatan RI).</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection