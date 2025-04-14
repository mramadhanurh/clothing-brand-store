<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_order', 'id_produk', 'qty', 'harga',
    ];

    public function products()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
}
