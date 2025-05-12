<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Catatan Emosi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <a href="{{ route('emotions.index') }}" class="text-blue-600 hover:text-blue-900">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar
                        </a>
                    </div>

                    <form method="POST" action="{{ route('emotions.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="mood" class="block text-sm font-medium text-gray-700">Mood / Perasaan Anda</label>
                            <select id="mood" name="mood" required class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Pilih mood</option>
                                <option value="Senang">Senang</option>
                                <option value="Bahagia">Bahagia</option>
                                <option value="Tenang">Tenang</option>
                                <option value="Puas">Puas</option>
                                <option value="Netral">Netral</option>
                                <option value="Sedih">Sedih</option>
                                <option value="Cemas">Cemas</option>
                                <option value="Marah">Marah</option>
                                <option value="Takut">Takut</option>
                                <option value="Frustasi">Frustasi</option>
                                <option value="Kecewa">Kecewa</option>
                                <option value="Bingung">Bingung</option>
                                <option value="Lelah">Lelah</option>
                                <option value="Lainnya">Lainnya (jelaskan di catatan)</option>
                            </select>
                            @error('mood')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="intensity" class="block text-sm font-medium text-gray-700">Intensitas (1-10)</label>
                            <div class="mt-1">
                                <div class="flex items-center space-x-2">
                                    <input type="range" id="intensity" name="intensity" min="1" max="10" value="5" 
                                           class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                                           oninput="intensityValue.innerText = this.value">
                                    <span id="intensityValue" class="text-gray-700 w-8 text-center">5</span>
                                </div>
                                <div class="flex justify-between text-xs text-gray-500 px-1 mt-1">
                                    <span>Ringan</span>
                                    <span>Sedang</span>
                                    <span>Kuat</span>
                                </div>
                            </div>
                            @error('intensity')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700">Catatan (Apa yang memicu perasaan ini?)</label>
                            <div class="mt-1">
                                <textarea id="notes" name="notes" rows="4" 
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                    placeholder="Ceritakan apa yang terjadi, apa yang Anda pikirkan dan rasakan..."></textarea>
                            </div>
                            @error('notes')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center py-3">
                            <input id="trigger_identified" name="trigger_identified" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="trigger_identified" class="ml-2 block text-sm text-gray-900">
                                Saya telah mengidentifikasi pemicu emosi ini
                            </label>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-sm font-medium text-gray-700 mb-2">Tips mengelola emosi:</h3>
                            <ul class="text-sm text-gray-600 list-disc pl-5 space-y-1">
                                <li>Ambil napas dalam-dalam secara perlahan</li>
                                <li>Kenali emosi tanpa menghakimi diri sendiri</li>
                                <li>Coba teknik grounding 5-4-3-2-1 (5 hal yang bisa dilihat, 4 hal yang bisa disentuh, dst)</li>
                                <li>Lakukan aktivitas fisik ringan untuk melepas ketegangan</li>
                            </ul>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Simpan Catatan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script untuk memperbarui tampilan intensitas secara real-time
        document.addEventListener("DOMContentLoaded", function() {
            const intensitySlider = document.getElementById('intensity');
            const intensityValue = document.getElementById('intensityValue');
            
            // Inisialisasi nilai awal
            intensityValue.innerText = intensitySlider.value;
            
            // Menambahkan event listener untuk slider
            intensitySlider.addEventListener('input', function() {
                intensityValue.innerText = this.value;
                
                // Mengubah warna berdasarkan intensitas
                if (this.value <= 3) {
                    intensityValue.className = 'text-green-600 w-8 text-center font-medium';
                } else if (this.value <= 7) {
                    intensityValue.className = 'text-yellow-600 w-8 text-center font-medium';
                } else {
                    intensityValue.className = 'text-red-600 w-8 text-center font-medium';
                }
            });
        });
    </script>
</x-app-layout>