<?php

use Illuminate\Support\Facades\Route;
use Faker\Factory as Faker;

Route::get('/', function () {
    $contacts = [];
    $faker = Faker::create();
    for ($i = 1; $i <= 100; $i++) {
        $contacts[] = [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->phoneNumber
        ];
    };
    return view('pages.dashboard.index', ['contacts' => $contacts]);
});

Route::get('/user', function () {
    return view('pages.user.index');
});
