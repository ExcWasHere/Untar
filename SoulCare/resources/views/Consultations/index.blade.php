<!-- resources/views/consultations/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Konsultasi dengan Psikolog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">Riwayat Konsultasi</h3>
                        <a href="{{ route('consultations.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                            Buat Janji Konsultasi
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    @if(count($consultations) > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="py-3 px-4 text-left">Tanggal</th>
                                        <th class="py-3 px-4 text-left">Waktu</th>
                                        <th class="py-3 px-4 text-left">Psikolog</th>
                                        <th class="py-3 px-4 text-left">Status</th>
                                        <th class="py-3 px-4 text-left">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($consultations as $consultation)
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="py-3 px-4">{{ $consultation->date->format('d/m/Y') }}</td>
                                            <td class="py-3 px-4">{{ date('H:i', strtotime($consultation->time)) }}</td>
                                            <td class="py-3 px-4">{{ $consultation->therapist_name }}</td>
                                            <td class="py-3 px-4">
                                                @if($consultation->status == 'scheduled')
                                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">Terjadwal</span>
                                                @elseif($consultation->status == 'completed')
                                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Selesai</span>
                                                @else
                                                    <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Dibatalkan</span>
                                                @endif
                                            </td>
                                            <td class="py-3 px-4">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('consultations.show', $consultation->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">Detail</a>
                                                    
                                                    @if($consultation->status == 'scheduled')
                                                        <a href="{{ route('consultations.join', $consultation->id) }}" class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 text-sm">Gabung</a>
                                                        
                                                        <form action="{{ route('consultations.cancel', $consultation->id) }}" method="POST" class="inline">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm" onclick="return confirm('Apakah Anda yakin ingin membatalkan konsultasi ini?')">Batalkan</button>
                                                        </form>
                                                    @endif
                                                    
                                                    @if($consultation->status == 'completed')
                                                        <a href="{{ route('consultations.feedback', $consultation->id) }}" class="px-3 py-1 bg-purple-500 text-white rounded hover:bg-purple-600 text-sm">Beri Ulasan</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-4">
                            {{ $consultations->links() }}
                        </div>
                    @else
                        <div class="bg-gray-50 p-8 text-center rounded-lg">
                            <p class="text-gray-600">Anda belum memiliki riwayat konsultasi.</p>
                            <a href="{{ route('consultations.create') }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                                Buat Janji Konsultasi Pertama Anda
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Informasi Konsultasi</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-medium text-gray-800 mb-2">Cara Konsultasi</h4>
                            <ul class="list-disc pl-5 text-gray-600">
                                <li>Pilih "Buat Janji Konsultasi" di atas</li>
                                <li>Pilih psikolog yang tersedia</li>
                                <li>Pilih tanggal dan waktu yang sesuai</li>
                                <li>Isi keluhan atau masalah yang ingin dibahas</li>
                                <li>Konfirmasi jadwal konsultasi</li>
                            </ul>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-medium text-gray-800 mb-2">Ketentuan Konsultasi</h4>
                            <ul class="list-disc pl-5 text-gray-600">
                                <li>Pastikan koneksi internet stabil saat konsultasi</li>
                                <li>Sediakan tempat yang tenang dan privat</li>
                                <li>Pembatalan dapat dilakukan minimal 6 jam sebelum jadwal</li>
                                <li>Sesi konsultasi berlangsung selama 60 menit</li>
                                <li>Setelah selesai, Anda dapat memberikan ulasan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>