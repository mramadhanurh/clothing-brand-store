<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminorderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->first();
        return view('orders.detail', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->input('status');
        $order->update();
        return redirect('orders')->with('status', "Status updated successfully!");
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
