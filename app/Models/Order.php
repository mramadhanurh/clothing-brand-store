<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user', 'nama_lengkap', 'email', 'no_hp', 'alamat', 'total_harga', 'status',
    ];

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class, 'id_order');
    }
}
