<?php

use App\Models\User;
use App\Http\Controllers\ContactController;
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
    $contacts = User::all();
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

Route::prefix('/contact')->name('contact.')->group(function(){
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::get('/create', [ContactController::class, 'create'])->name('create');
    Route::post('/store', [ContactController::class, 'store'])->name('store');
    Route::get('/edit/{contact}', [ContactController::class, 'edit'])->name('edit');
    Route::put('/update/{contact}', [ContactController::class, 'update'])->name('update');
});

Route::get('/user', function () {
    return view('pages.user.index');
})->name('user');
