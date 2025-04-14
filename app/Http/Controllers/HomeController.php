<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function myOrder()
    {
        $orders = Order::where('id_user', Auth::id())->get();
        return view('user.order.index', compact('orders'));
    }

    public function viewMyorder($id)
    {
        $order = Order::where('id', $id)->where('id_user', Auth::id())->first();
        return view('user.order.view', compact('order'));
    }

}
