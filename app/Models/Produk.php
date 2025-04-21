<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk', 'id_kategori', 'harga', 'qty', 'image', 'status', 'deskripsi',
    ];

    // Relasi ke Kategori (Satu Kategori dimiliki banyak Produk)
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function images()
    {
        return $this->hasMany(ProdukImage::class);
    }
}
