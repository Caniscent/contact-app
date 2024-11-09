@extends('layouts.app')

@section('title', 'Tambah Contact')

@section('content')
<div class="flex items-center justify-center min-h-screen mt-16">
    <div class="bg-white shadow rounded-lg p-6 sm:p-8 lg:p-10 w-full max-w-md">
        <h3 class="text-xl font-semibold text-gray-800 mb-6 text-center">Form Edit Kontak</h3>
        <form action="{{ route('contact.update', $contact->id) }}" method="post">
            @csrf
            @method("PUT")
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Mahasiswa</label>
                <input type="text" value="{{$contact->name}}" name="name" id="name" class="mt-1 block w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan nama">
                @error("name")
                    <p class="text-red-600">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" value="{{$contact->email}}" name="email" id="email" class="mt-1 block w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan email">
                @error("email")
                    <p class="text-red-600">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="phone" class="block text-sm font-medium text-gray-700">No. Hp</label>
                <input type="number" value="{{$contact->phone}}" name="phone" id="phone" class="no-spinners mt-1 block w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan nomor hp">
                @error("phone")
                    <p class="text-red-600">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="address" value="{{$contact->address}}" name="address" id="address" class="mt-1 block w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan alamat">
                @error("address")
                    <p class="text-red-600">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="w-full px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Kirim
            </button>
        </form>
    </div>
</div>
@endsection
