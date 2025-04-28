<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDetailController;
use App\Models\UserDetail;

Route::get('/', [UserController::class, 'loadLogin']);
Route::get('/register', [UserController::class, 'loadRegister']);
Route::post('/register', [UserController::class, 'Register'])->name('Register');
Route::get('/login', [UserController::class, 'loadLogin']);
Route::post('/login', [UserController::class, 'Login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserDetailController::class, 'loadUsers'])->name('users.index');
    Route::post('/users', [UserDetailController::class, 'AddUser'])->name('AddUser');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::get('/dashboard', function () {
    if (session('is_admin')) {
        $users = UserDetail::all(); // <-- fetch all users for admin dashboard
        return view('dashboard', compact('users'));
    } else {
        return redirect('/login')->with('fail', 'Unauthorized access.');
    }
})->name('dashboard');
