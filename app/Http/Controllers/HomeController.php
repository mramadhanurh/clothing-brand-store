<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function changePassword()
    {
        return view('change-password');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if ($request->old_password != auth()->user()->password) {
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => $request->new_password
        ]);

        return back()->with("status", "Password changed successfully!");
    }

}
