<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user', 'id_produk', 'produk_qty',
    ];

    public function products()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
}
