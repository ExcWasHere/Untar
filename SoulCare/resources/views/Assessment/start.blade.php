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