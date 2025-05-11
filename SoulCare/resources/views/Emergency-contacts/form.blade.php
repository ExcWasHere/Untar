@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">
                        {{ isset($emergencyContact) ? 'Edit Kontak Darurat' : 'Tambah Kontak Darurat' }}
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">Kontak darurat akan dihubungi saat keadaan genting.</p>
                </div>

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ isset($emergencyContact) ? route('emergency-contacts.update', $emergencyContact->id) : route('emergency-contacts.store') }}">
                    @csrf
                    @if(isset($emergencyContact))
                        @method('PUT')
                    @endif

                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ isset($emergencyContact) ? $emergencyContact->name : old('name') }}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div class="mb-6">
                        <label for="relationship" class="block text-sm font-medium text-gray-700 mb-1">Hubungan</label>
                        <select name="relationship" id="relationship" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">Pilih Hubungan</option>
                            <option value="Keluarga" {{ (isset($emergencyContact) && $emergencyContact->relationship == 'Keluarga') || old('relationship') == 'Keluarga' ? 'selected' : '' }}>Keluarga</option>
                            <option value="Teman" {{ (isset($emergencyContact) && $emergencyContact->relationship == 'Teman') || old('relationship') == 'Teman' ? 'selected' : '' }}>Teman</option>
                            <option value="Pasangan" {{ (isset($emergencyContact) && $emergencyContact->relationship == 'Pasangan') || old('relationship') == 'Pasangan' ? 'selected' : '' }}>Pasangan</option>
                            <option value="Lainnya" {{ (isset($emergencyContact) && $emergencyContact->relationship == 'Lainnya') || old('relationship') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                        <input type="tel" name="phone_number" id="phone_number" value="{{ isset($emergencyContact) ? $emergencyContact->phone_number : old('phone_number') }}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <p class="text-xs text-gray-500 mt-1">Format: +62xxxxxxxxxx</p>
                    </div>

                    <div class="mb-6">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat (Opsional)</label>
                        <textarea name="address" id="address" rows="3" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ isset($emergencyContact) ? $emergencyContact->address : old('address') }}</textarea>
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('emergency-contacts.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            {{ isset($emergencyContact) ? 'Perbarui Kontak' : 'Simpan Kontak' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection