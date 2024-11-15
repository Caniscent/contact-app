@extends('layouts.app')

@section('title', 'User | Contact App')

@section('content')
    @auth
        <h1 class="mt-16">Ini page user</h1>
    @else
        <p class="mt-16">minimal login</p>
    @endauth
@endsection
