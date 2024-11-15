@extends('layouts.app')

@section('title', 'Contact | Contact App')

@section('content')
@auth
<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 mt-16">
    <div class="mb-4 flex items-center justify-between">
        <div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">List Mahasiswa</h3>
            <span class="text-base font-normal text-gray-500">Ini adalah list mahasiswa</span>
        </div>
        <div class="flex-shrink-0">
            <a href="{{route('contact.create')}}" class="bg-blue-500 text-sm font-medium text-white hover:bg-blue-700 rounded-lg p-2">Tambah Kontak Mahasiswa</a>
        </div>
    </div>
    <div class="flex flex-col mt-8">
        <div class="overflow-x-auto rounded-lg">
            <div class="align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No
                                </th>
                                <th scope="col"
                                    class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Mahasiswa
                                </th>
                                <th scope="col"
                                    class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col"
                                    class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No. HP
                                </th>
                                <th scope="col"
                                    class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Alamat
                                </th>
                                <th scope="col"
                                    class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                    @foreach ($contacts as $contact)
                        <tbody class="bg-white">
                            <tr>
                                <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                    {{$loop->iteration}}
                                </td>
                                <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                    {{$contact['name']}}
                                </td>
                                <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                    {{$contact['email']}}
                                </td>
                                <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                    {{$contact['phone']}}
                                </td>
                                <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                    {{$contact['address']}}
                                </td>
                                <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                    <a href="{{route('contact.edit', $contact->id)}}" class="bg-yellow-300 rounded-lg hover:bg-yellow-400 px-2 py-1">Update</a>
                                    <form action="{{route('contact.delete', $contact->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="bg-red-500 rounded-lg hover:bg-red-600 px-2 py-1 mt-2">Delete<button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    <p class="mt-16">minimal login</p>
@endauth
@endsection
