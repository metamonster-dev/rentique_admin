<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WithdrawnUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::guard('admin')->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AdminDashboardController::class, 'logout'])->name('logout');

//    Route::delete('/users/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::delete('/users/bulk-delete', [UserController::class, 'bulkDelete'])->name('users.bulkDelete');
    Route::resource('users', UserController::class);

    Route::get('withdrawnUsers', [WithdrawnUserController::class, 'index'])->name('withdrawnUsers.index');
    Route::get('withdrawnUsers/{id}', [WithdrawnUserController::class, 'show'])->name('withdrawnUsers.show');
    Route::patch('withdrawnUsers/update/{id}', [WithdrawnUserController::class, 'update'])->name('withdrawnUsers.update');
    Route::patch('withdrawnUsers/restore/{id}', [WithdrawnUserController::class, 'restore'])->name('withdrawnUsers.restore');
    Route::patch('withdrawnUsers/bulk-restore', [WithdrawnUserController::class, 'bulkRestore'])->name('withdrawnUsers.bulkRestore');
});
