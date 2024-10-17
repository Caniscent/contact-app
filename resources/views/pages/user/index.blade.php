@extends('layouts.app')

@section('title', 'User | Contact App')

@section('content')
    @if(session()->has('user'))
        <h1 class="mt-16">Ini page user</h1>
    @else
        <p class="mt-16">minimal login</p>
    @endif
@endsection
