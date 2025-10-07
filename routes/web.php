<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembersBookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\WritersBookController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/writer/books',[WritersBookController::class,'index'])->name('writer.books');
    Route::get('/member/books',[MembersBookController::class,'index'])->name('member.books');
    Route::middleware('isAdmin')->group(function () {
        Route::get('/',[UserController::class,'index'])->name('home');
        Route::resource('books',BookController::class);
        Route::resource('writers',WriterController::class);
        Route::resource('members',MemberController::class);
    });
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});
Route::middleware('guest')->group(function () {
    Route::get('/login',[AuthController::class,'loginForm'])->name('login.form');
    Route::post('/login',[AuthController::class,'login'])->name('login');
});
