@extends('layouts.app')

@section('title', 'Contact | Contact App')

@section('content')
@if(session()->has('user'))
<div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 mt-16">
    <div class="mb-4 flex items-center justify-between">
        <div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">List Mahasiswa</h3>
            <span class="text-base font-normal text-gray-500">Ini adalah list mahasiswa</span>
        </div>
        <div class="flex-shrink-0">
            <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg p-2">View
                all</a>
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
@endif
@endsection
