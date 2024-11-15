@extends('layouts.app')

@section('title','auth')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-50">
    <div class="w-full max-w-md p-8 space-y-8 shadow-lg card bg-white rounded-lg">
        <h2 class="text-3xl font-extrabold text-center text-gray-800">
            <a href="{{url('/')}}" class="text-blue-600 hover:underline">Contact App</a>
            {{ __('Login') }}
        </h2>

        <form method="POST" action="{{ route('authenticate') }}" class="space-y-6">
            @csrf

            <!-- Name Input -->
            <div class="form-group">
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                <input id="username" type="text" name="username" required autocomplete="username" autofocus
                       class="input input-bordered w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Password Input -->
            <div class="form-group">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                       class="input input-bordered w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-50">
            </div>

            <!-- Remember Me Checkbox -->
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                <label for="remember" class="ml-2 text-sm font-medium text-gray-900">Ingat Saya</label>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" href="{{url('/')}}" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login</button>
            </div>

            <!-- Forgot Password -->
            {{-- @if (Route::has('password.request'))
                <div class="text-center">
                    <a class="text-blue-400 hover:underline" href="{{ route('password.request') }}">
                        {{ __('Lupa Password?') }}
                    </a>
                </div>
            @endif --}}

            <!-- Register -->
            @if (Route::has('register'))
                <div class="text-center text-gray-900">
                    {{__("Tidak punya akun?")}}
                    <a class="text-blue-600 hover:underline" href="{{ route('register') }}">
                        {{ __("Daftar sekarang") }}
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
