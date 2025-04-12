<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if (Auth::check()) 
        {
            $prod_check = Produk::where('id', $product_id)->first();

            if ($prod_check) 
            {
                if (Cart::where('id_produk', $product_id)->where('id_user', Auth::id())->exists()) 
                {
                    return response()->json(['status' => $prod_check->nama_produk." Already Added to Cart"]);
                }else{
                    $cartItem = new Cart();
                    $cartItem->id_produk = $product_id;
                    $cartItem->id_user = Auth::id();
                    $cartItem->produk_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->nama_produk." Added to Cart"]);
                }
            }
        }else{
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    public function viewcart()
    {
        $cartitems = Cart::where('id_user', Auth::id())->get();
        return view('frontend.cart', compact('cartitems'));
    }

    public function updateCart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $prod_qty = $request->input('prod_qty');

        if (Auth::check()) 
        {
            if (Cart::where('id_produk', $prod_id)->where('id_user', Auth::id())->exists())
            {
                $cart = Cart::where('id_produk', $prod_id)->where('id_user', Auth::id())->first();
                $cart->produk_qty = $prod_qty;
                $cart->update();
                return response()->json(['status' => "Quantity Updated"]);
            }
        }
    }

    public function deleteProduct(Request $request)
    {
        if (Auth::check()) 
        {
            $prod_id = $request->input('prod_id');
            if (Cart::where('id_produk', $prod_id)->where('id_user', Auth::id())->exists()) 
            {
                $cartItem = Cart::where('id_produk', $prod_id)->where('id_user', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Product Item Deleted Successfully"]);
            }
        }else{
            return response()->json(['status' => "Login to Continue"]);
        }
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
