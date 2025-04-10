<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'web_name', 'address', 'description', 'phone_number', 'email', 'image_logo_web', 'facebook', 'instagram', 'whatsapp',
    ];
}
