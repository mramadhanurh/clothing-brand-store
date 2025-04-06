<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class BerandapageController extends Controller
{
    public function index()
    {
        $latest_products = Produk::orderBy('created_at', 'desc')->take(5)->get();
        return view('frontend.index', compact('latest_products'));
    }

    public function category()
    {
        $category = Kategori::latest()->get();
        return view('frontend.category', compact('category'));
    }

    public function viewcategory($id)
    {
        if (Kategori::where('id', $id)->exists()) 
        {
            $category = Kategori::where('id', $id)->first();
            $products = Produk::where('id_kategori', $category->id)->get();
            return view('frontend.products', compact('category', 'products'));
        }else{
            return redirect('/')->with('status', "Id tidak ditemukan!");
        }
    }
}
