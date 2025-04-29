<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\ProdukImage;
use App\Models\Setting;
use Illuminate\Http\Request;

class BerandapageController extends Controller
{
    public function index()
    {
        $latest_products = Produk::orderBy('created_at', 'desc')->take(5)->get();
        $products_week = Produk::orderBy('created_at', 'asc')->take(4)->get();
        $category = Kategori::orderBy('created_at', 'asc')->get();
        $iklan = Iklan::first();
        $setting = Setting::first();
        return view('frontend.index', compact('latest_products', 'products_week', 'category', 'iklan', 'setting'));
    }

    public function shop()
    {
        $product_shop = Produk::orderBy('created_at', 'asc')->get();
        $setting = Setting::first();
        return view('frontend.shop', compact('product_shop', 'setting'));
    }

    public function category()
    {
        $category = Kategori::latest()->get();
        $setting = Setting::first();
        return view('frontend.category', compact('category', 'setting'));
    }

    public function viewcategory($id)
    {
        if (Kategori::where('id', $id)->exists()) {
            $category = Kategori::where('id', $id)->first();
            $products = Produk::where('id_kategori', $category->id)->get();
            $setting = Setting::first();
            return view('frontend.products', compact('category', 'products', 'setting'));
        } else {
            return redirect('/')->with('status', "Id tidak ditemukan!");
        }
    }

    public function viewproduct($cate_id, $prod_id)
    {
        if (Kategori::where('id', $cate_id)->exists()) {
            if (Produk::where('id', $prod_id)->exists()) {
                $products = Produk::where('id', $prod_id)->first();
                $productImages = ProdukImage::where('produk_id', $products->id)->get();
                $setting = Setting::first();

                return view('frontend.detailproducts', compact('products', 'productImages', 'setting'));
            } else {
                return redirect('/')->with('status', "Detail Product tidak ditemukan!");
            }
        } else {
            return redirect('/')->with('status', "Category Product tidak ditemukan!");
        }
    }
}
