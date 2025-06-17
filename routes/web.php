<?php

use App\Http\Controllers\HomeControler;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeControler::class,'index'])->name('home')->middleware('auth');
//register
Route::get('register',[RegisterController::class,'index'])->name('register');
Route::post('register',[RegisterController::class,'store'])->name('register.store');
//login
Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'proses'])->name('login.proses');
Route::get('logout',[LoginController::class,'logout'])->name('login.logout');

//User
Route::get('users', function () {
    return view('users.index');
})->name('users')->middleware('auth');

//Mobil
Route::get('mobil', function () {
    return view('mobil.index');
})->name('mobil')->middleware('auth');

//transaksi
Route::get('transaksi', function () {
    return view('transaksi.index');
})->name('transaksi')->middleware('auth');

//laporan
Route::get('laporan', function () {
    return view('laporan.index');
})->name('laporan')->middleware('auth');

