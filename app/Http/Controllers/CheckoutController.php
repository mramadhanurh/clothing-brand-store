<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Produk;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartItems = Cart::where('id_user', Auth::id())->get();
        foreach ($old_cartItems as $item)
        {
            if (!Produk::where('id', $item->id_produk)->where('qty', '>=', $item->produk_qty)->exists()) 
            {
                $removeItem = Cart::where('id_user', Auth::id())->where('id_produk', $item->id_produk)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('id_user', Auth::id())->get();
        $setting = Setting::first();


        return view('frontend.checkout', compact('cartItems', 'setting'));
    }

    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->id_user = Auth::id();
        $order->nama_lengkap = $request->input('nama_lengkap');
        $order->email = $request->input('email');
        $order->no_hp = $request->input('no_hp');
        $order->alamat = $request->input('alamat');

        // hitungan total harga
        $total = 0;
        $cartitems_total = Cart::where('id_user', Auth::id())->get();
        foreach ($cartitems_total as $prod) 
        {
            $total += $prod->products->harga * $prod->produk_qty;
        }

        $order->total_harga = $total;

        $order->save();

        $cartItems = Cart::where('id_user', Auth::id())->get();
        foreach ($cartItems as $item) 
        {
            OrderItem::create([
                'id_order' => $order->id,
                'id_produk' => $item->id_produk,
                'qty' => $item->produk_qty,
                'harga' => $item->products->harga,
            ]);

            $prod = Produk::where('id', $item->id_produk)->first();
            $prod->qty = $prod->qty - $item->produk_qty;
            $prod->update();
        }

        $cartItems = Cart::where('id_user', Auth::id())->get();
        Cart::destroy($cartItems);

        return redirect('checkout')->with('status', "Proses Order Berhasil");
    }

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
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
