<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class BerandapageController extends Controller
{
    public function index()
    {
        $latest_products = Produk::orderBy('created_at', 'desc')->take(5)->get();
        return view('frontend.index', compact('latest_products'));
    }
}
