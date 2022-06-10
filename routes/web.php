<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Global Middlewares Applied
|--------------------------------------------------------------------------
|
| 1. PreventBackHistory
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('user', [UserController::class, 'index'])->name('user.index');
Route::get('user/contact', [ContactController::class, 'index'])->name('user.contact');
Route::post('user/contact/save', [ContactController::class, 'save'])->name('user.contact.save');

Route::middleware(['is_admin'])->group(function () {
    
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('admin/users', [UserController::class, 'getUsers'])->name('admin.users');
    Route::get('admin/users/create', [UserController::class, 'createUser'])->name('admin.users.create');
    Route::post('admin/users/save', [UserController::class, 'saveUser'])->name('admin.users.save');
    Route::get('admin/users/edit/{item}', [UserController::class, 'editUser'])->name('admin.users.edit');
    Route::post('admin/users/update', [UserController::class, 'updateUser'])->name('admin.users.update');
    Route::get('admin/users/delete/{item}', [UserController::class, 'deleteUser'])->name('admin.users.delete');
    
    Route::get('switch/{item}', [AdminController::class, 'switch'])->name('switch.user');

});



