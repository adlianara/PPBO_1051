<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    // ini adalah function index yang kita tambahkan, function ini akan mengembalikan view hello.blade.php
    public function index()
    {
        $mahasiswa = Mahasiswa::all(); // Mengambil semua data mahasiswa dari database
        return view('hello', compact('mahasiswa')); // Mengirim data mahasiswa ke view hello.blade.php
    }
}