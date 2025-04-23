<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\UserController;



// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/' , [UserController::class , 'loadLogin']);
Route::get('/register' , [UserController::class , 'loadRegister']);
Route::post('/register' , [UserController::class , 'Register'])->name('Register');
Route::get('/login' , [UserController::class , 'loadLogin']);
Route::post('/login' , [UserController::class , 'Login'])->name('login');

Route::get('/users', [UserDetailController::class, 'loadUsers']);
Route::post('/users', [UserDetailController::class, 'AddUser'])->name('AddUser');

Route::get('/users', [UserDetailController::class, 'loadUsers'])->name('loadUsers');
Route::post('/add-user', [UserDetailController::class, 'AddUser'])->name('AddUser');

Route::get('/dashboard', [UserDetailController::class, 'dashboard'])->name('dashboard');


