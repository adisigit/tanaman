<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar_produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'ukuran',
        'tipe',
        'path'
    ];
}
