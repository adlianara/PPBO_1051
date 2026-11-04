<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // Tambahkan ini untuk mengatur kolom yang dapat diisi secara massal
    protected $fillable = ['nama', 
    'nim'
    ];
}