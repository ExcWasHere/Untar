<!-- resources/views/social-interactions/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Interaksi Sosial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">Riwayat Interaksi Sosial</h3>
                        <a href="{{ route('social-interactions.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                            Tambah Interaksi
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    @if(count($interactions) > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="py-3 px-4 text-left">Tanggal</th>
                                        <th class="py-3 px-4 text-left">Orang</th>
                                        <th class="py-3 px-4 text-left">Jenis Interaksi</th>
                                        <th class="py-3 px-4 text-left">Tingkat Kenyamanan</th>
                                        <th class="py-3 px-4 text-left">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($interactions as $interaction)
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="py-3 px-4">{{ $interaction->date->format('d/m/Y') }}</td>
                                            <td class="py-3 px-4">{{ $interaction->person }}</td>
                                            <td class="py-3 px-4">{{ $interaction->interaction_type }}</td>
                                            <td class="py-3 px-4">
                                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ ($interaction->comfort_level / 10) * 100 }}%"></div>
                                                </div>
                                                <span class="text-xs text-gray-600">{{ $interaction->comfort_level }}/10</span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('social-interactions.show', $interaction->id) }}" class="text-blue-500 hover:underline">Detail</a>
                                                    <a href="{{ route('social-interactions.edit', $interaction->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                                                    <form method="POST" action="{{ route('social-interactions.destroy', $interaction->id) }}" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menghapus interaksi ini?')">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-4">
                            {{ $interactions->links() }}
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                            </svg>
                            <p class="mt-2 text-gray-500">Belum ada interaksi sosial yang dicatat</p>
                            <a href="{{ route('social-interactions.create') }}" class="mt-3 inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                                Tambah Interaksi Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- resources/views/social-interactions/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Interaksi Sosial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('social-interactions.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="person" class="block text-sm font-medium text-gray-700">Nama Orang</label>
                            <input type="text" name="person" id="person" value="{{ old('person') }}" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                            @error('person')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="interaction_type" class="block text-sm font-medium text-gray-700">Jenis Interaksi</label>
                            <select name="interaction_type" id="interaction_type" required 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                <option value="">Pilih jenis interaksi</option>
                                <option value="Percakapan" {{ old('interaction_type') == 'Percakapan' ? 'selected' : '' }}>Percakapan</option>
                                <option value="Pertemuan" {{ old('interaction_type') == 'Pertemuan' ? 'selected' : '' }}>Pertemuan</option>
                                <option value="Kegiatan Bersama" {{ old('interaction_type') == 'Kegiatan Bersama' ? 'selected' : '' }}>Kegiatan Bersama</option>
                                <option value="Online" {{ old('interaction_type') == 'Online' ? 'selected' : '' }}>Online</option>
                                <option value="Lainnya" {{ old('interaction_type') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('interaction_type')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" name="date" id="date" value="{{ old('date', date('Y-m-d')) }}" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                            @error('date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="duration" class="block text-sm font-medium text-gray-700">Durasi (menit)</label>
                            <input type="number" name="duration" id="duration" value="{{ old('duration') }}" min="1" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                            @error('duration')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="comfort_level" class="block text-sm font-medium text-gray-700">Tingkat Kenyamanan (1-10)</label>
                            <div class="flex items-center">
                                <input type="range" name="comfort_level" id="comfort_level" min="1" max="10" value="{{ old('comfort_level', 5) }}" 
                                       class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer" oninput="updateComfortValue(this.value)">
                                <span id="comfort_value" class="ml-2 text-gray-700">5</span>
                            </div>
                            @error('comfort_level')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="notes" class="block text-sm font-medium text-gray-700">Catatan</label>
                            <textarea name="notes" id="notes" rows="4" 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">{{ old('notes') }}</textarea>
                            @error('notes')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('social-interactions') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md mr-2 hover:bg-gray-400 transition">
                                Batal
                            </a>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateComfortValue(val) {
            document.getElementById('comfort_value').textContent = val;
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            updateComfortValue(document.getElementById('comfort_level').value);
        });
    </script>
</x-app-layout>