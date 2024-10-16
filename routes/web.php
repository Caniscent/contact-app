<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Faker\Factory as Faker;


Route::post('/dummy-login', function(Request $request){
    $request->session()->put('user',$request->name);
    return redirect('/');
})->name('dummy-login');

Route::get('/', function (Request $request) {
    if (!$request->session()->has('user')) {
        return redirect('/login');
    }


    $contacts = [];
    $faker = Faker::create();
    for ($i = 1; $i <= 20; $i++) {
        $contacts[] = [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->phoneNumber,
            'datetime' => $faker->dateTimeBetween('-10 years', 'now'),
        ];
    };

    $contacts = collect($contacts)->sortBy('name')->values()->all();
    return view('pages.dashboard.index', ['contacts' => $contacts]);
})->name('dashboard');

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::get('/register', function(){
    return view('auth.register');
})->name('register');

Route::get('/user', function () {
    return view('pages.user.index');
})->name('user');
