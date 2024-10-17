<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Faker\Factory as Faker;


Route::post('/dummy-login', function(Request $request){
    $request->session()->put('user',$request->name);
    return redirect('/');
})->name('dummy-login');

Route::get('/', function (Request $request) {
    $username = $request->session()->get('user');

    $contacts = [];
    $faker = Faker::create();
    for ($i = 1; $i <= 355; $i++) {
        $contacts[] = [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->phoneNumber,
            'datetime' => $faker->dateTimeBetween('-10 years', 'now'),
        ];
    };

    $contacts = collect($contacts)->sortBy('name')->values()->all();
    return view('pages.dashboard.index', ['contacts' => $contacts, 'username' => $username]);
})->name('dashboard');

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::get('/register', function(){
    return view('auth.register');
})->name('register');

Route::post('/logout', function (Request $request) {
    $request->session()->forget('user');
    return redirect('/login');
})->name('logout');

Route::get('/contact', function () {
    $contacts = [];
    $faker = Faker::create();
    for ($i = 1; $i <= 355; $i++) {
        $contacts[] = [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->phoneNumber,
            'datetime' => $faker->dateTimeBetween('-10 years', 'now'),
        ];
    };

    $contacts = collect($contacts)->sortBy('name')->values()->all();
    return view('pages.contact.index', ['contacts' => $contacts]);
})->name('contact');

Route::get('/user', function () {
    return view('pages.user.index');
})->name('user');
