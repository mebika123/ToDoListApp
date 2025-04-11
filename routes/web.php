<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\CategoryController;
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
    Route::get('/tasks', [TaskController::class, "index"])->name('task.index');
    Route::get('/task/create', [TaskController::class, "create"])->name('task.create');
    Route::post('/task/store', [TaskController::class, "store"])->name('task.store');
    Route::get('/task/edit/{id}', [TaskController::class, "edit"])->name('task.edit');
    Route::put('/task/update', [TaskController::class, "update"])->name('task.update');
    Route::put('/task/updateStatus', [TaskController::class, "updateStatus"])->name('task.update_status');
    Route::delete('/task/delete/{id}', [TaskController::class, "delete"])->name('task.delete');
    
    Route::get('/categories', [CategoryController::class, "index"])->name('category.index');
    Route::get('/category/create', [CategoryController::class, "create"])->name('category.create');
    Route::post('/category/store', [CategoryController::class, "store"])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, "edit"])->name('category.edit');
    Route::put('/category/update', [CategoryController::class, "update"])->name('category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, "delete"])->name('category.delete');
});
