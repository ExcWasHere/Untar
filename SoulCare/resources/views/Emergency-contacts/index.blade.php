@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Kontak Darurat</h2>
                    <button type="button" onclick="window.location.href='{{ route('emergency-contacts.create') }}'" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                        Tambah Kontak
                    </button>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if($emergencyContacts->isEmpty())
                    <div class="text-center py-8">
                        <p class="text-gray-500">Anda belum memiliki kontak darurat.</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 text-left">Nama</th>
                                    <th class="py-3 px-4 text-left">Hubungan</th>
                                    <th class="py-3 px-4 text-left">Nomor Telepon</th>
                                    <th class="py-3 px-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($emergencyContacts as $contact)
                                <tr>
                                    <td class="py-3 px-4">{{ $contact->name }}</td>
                                    <td class="py-3 px-4">{{ $contact->relationship }}</td>
                                    <td class="py-3 px-4">{{ $contact->phone_number }}</td>
                                    <td class="py-3 px-4 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ route('emergency-contacts.edit', $contact->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Edit</a>
                                            <form method="POST" action="{{ route('emergency-contacts.destroy', $contact->id) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kontak ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection