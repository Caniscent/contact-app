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
                    <input id="name" type="text" class="input input-bordered w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror"
                           name="name" value="{{ old('name') }}" placeholder="Masukkan nama anda" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="text-red-500 text-sm">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Usia -->
                <div class="form-group">
                    <label for="age" class="block text-sm font-medium text-gray-900">{{ __('Usia') }}</label>
                    <input id="age" type="number" class="input input-bordered w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('age') border-red-500 @enderror no-spinners"
                           name="age" value="{{ old('age') }}" placeholder="Masukkan usia anda" required autocomplete="age">
                    @error('age')
                        <span class="text-red-500 text-sm">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Jenis Kelamin -->
                <div class="form-group">
                    <label for="gender" class="block text-sm font-medium text-gray-900">{{ __('Jenis Kelamin') }}</label>
                    <select id="gender" class="input input-bordered w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('gender') border-red-500 @enderror"
                            name="gender" required>
                        <option value="" disabled selected>{{ __('Pilih jenis kelamin') }}</option>
                        <option value="laki-laki" {{ old('gender') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="perempuan" {{ old('gender') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('gender')
                        <span class="text-red-500 text-sm">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="block text-sm font-medium text-gray-900">{{ __('Email') }}</label>
                    <input id="email" type="email" class="input input-bordered w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror"
                           name="email" value="{{ old('email') }}" placeholder="Masukkan email anda" required autocomplete="email">
                    @error('email')
                        <span class="text-red-500 text-sm">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="block text-sm font-medium text-gray-900">{{ __('Password') }}</label>
                    <input id="password" type="password" class="input input-bordered w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror"
                           name="password" placeholder="Buat password dengan panjang minimal 8" required autocomplete="new-password">
                    @error('password')
                        <span class="text-red-500 text-sm">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div class="form-group">
                    <label for="password-confirm" class="block text-sm font-medium text-gray-900">{{ __('Konfirmasi Password') }}</label>
                    <input id="password-confirm" type="password" class="input input-bordered w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                           name="password_confirmation" placeholder="Konfirmasi password anda" required autocomplete="new-password">
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">{{ __('Register') }}</button>
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
