@extends('layouts.app')

@section('title','auth')

@section('content')
<div class="flex justify-center items-center min-h-screen">
    <div class="card w-full max-w-md shadow-lg bg-white rounded-lg">
        <div class="card-body p-6">
            <h2 class="text-3xl font-extrabold text-center text-gray-800">
                <a href="{{url('/')}}" class="text-blue-600 hover:underline">Contact App</a>
                {{ __('Register') }}
            </h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Nama -->
                <div class="form-group">
                    <label for="name" class="block text-sm font-medium text-gray-900">{{ __('Nama') }}</label>
                    <input id="name" type="text" class="input input-bordered w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                           name="name" placeholder="Masukkan nama anda" required autocomplete="name" autofocus>
                </div>

                {{-- Username --}}
                <div class="form-group">
                    <label for="username" class="block text-sm font-medium text-gray-900">{{ __('Username') }}</label>
                    <input id="username" type="text" class="input input-bordered w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                           name="username" placeholder="Masukkan nama anda" required autocomplete="username" autofocus>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="block text-sm font-medium text-gray-900">{{ __('Password') }}</label>
                    <input id="password" type="password" class="input input-bordered w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                           name="password" placeholder="Buat password dengan panjang minimal 6" required autocomplete="new-password">
                    @error("password")
                        <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                {{-- <div class="form-group">
                    <label for="password-confirm" class="block text-sm font-medium text-gray-900">{{ __('Konfirmasi Password') }}</label>
                    <input id="password-confirm" type="password" class="input input-bordered w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                           name="password_confirmation" placeholder="Konfirmasi password anda" required autocomplete="new-password">
                </div> --}}

                <!-- Submit Button -->
                <div class="form-group">
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register</button>
                </div>

                <!-- Login Link -->
                @if (Route::has('login'))
                    <div class="text-center text-sm text-gray-600 mt-4">
                        {{ __('Sudah punya akun?') }}
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">{{ __('Kembali ke login') }}</a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
