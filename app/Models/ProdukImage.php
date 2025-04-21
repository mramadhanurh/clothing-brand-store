<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukImage extends Model
{
    use HasFactory;
    
    protected $fillable = ['produk_id', 'image'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}