<?php

use Illuminate\Support\Facades\Route;

// Tambahkan ini
use App\Http\Controllers\HelloController;

Route::get('/', function () {
    return view('welcome');
});

// Ubah menjadi ini
Route::get('/hello', [HelloController::class, 'index']);