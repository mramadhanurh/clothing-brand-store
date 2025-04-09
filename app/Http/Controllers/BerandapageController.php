<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class BerandapageController extends Controller
{
    public function index()
    {
        $latest_products = Produk::orderBy('created_at', 'desc')->take(5)->get();
        $iklan = Iklan::first();
        return view('frontend.index', compact('latest_products', 'iklan'));
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

    public function viewproduct($cate_id, $prod_id)
    {
        if (Kategori::where('id', $cate_id)->exists()) 
        {
            if (Produk::where('id', $prod_id)->exists()) {
                $products = Produk::where('id', $prod_id)->first();
                return view('frontend.detailproducts', compact('products'));
            }else{
                return redirect('/')->with('status', "Detail Product tidak ditemukan!");
            }
        }else{
            return redirect('/')->with('status', "Category Product tidak ditemukan!");
        }
    }
}
