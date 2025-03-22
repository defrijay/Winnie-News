<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Produk extends Model
{
    protected $collection = 'produks'; // Nama koleksi di MongoDB
    protected $fillable = ['nama', 'deskripsi', 'harga'];
}
