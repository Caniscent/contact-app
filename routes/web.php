<?php

use App\Models\User;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Faker\Factory as Faker;


Route::get('/', function (Request $request) {
    return view('pages.dashboard.index');
})->name('dashboard')->middleware('auth');


Route::get('/login', function(){
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('/contact')->name('contact.')->group(function(){
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::get('/create', [ContactController::class, 'create'])->name('create');
    Route::post('/store', [ContactController::class, 'store'])->name('store');
    Route::get('/edit/{contact}', [ContactController::class, 'edit'])->name('edit');
    Route::put('/update/{contact}', [ContactController::class, 'update'])->name('update');
    Route::delete('/delete/{contact}', [ContactController::class, 'delete'])->name('delete');
});

Route::get('/user', function () {
    return view('pages.user.index');
})->name('user');
