<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});


//User Controller -- the name routes is used for migrating to another server - location and file of the view
Route::get('/login', [UserController::class, 'login'])->name('user.login');
Route::post('/login', [UserController::class, 'authenticate'])->name('user.authenticate');

Route::get('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/register', [UserController::class, 'saveuser'])->name('user.save');

//add middleware auth = will not allow user to directly open the profile page without logging-in
Route::get('/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');
