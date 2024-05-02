<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('pages.auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard', ['type_menu' => 'dashboard']);
// });

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('dashboard', ['type_menu' => 'dashboard']);
    });


    Route::resource('users', UserController::class);
});
