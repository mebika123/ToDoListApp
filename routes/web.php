<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/login',[AuthController::class, "login"])->name('login');
Route::post('/login',[AuthController::class, "loginPost"])->name('login.post');

Route::get('/register',[AuthController::class, "register"])->name('register');
Route::post('/register',[AuthController::class, "registerPost"])->name('register.post');
Route::post('/logout',[AuthController::class, "logout"])->name('logout');


Route::middleware("auth")->group(function(){
    Route::get('/home', function () {
        return view('welcome');
    })->name('home');
    Route::get('/tasks', [TaskController::class, "index"])->name('task');
    Route::get('/task/create', [TaskController::class, "create"])->name('task.create');
});
