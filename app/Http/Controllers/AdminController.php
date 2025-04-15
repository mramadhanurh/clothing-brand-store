<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Order;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $users = Order::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->pluck('count');
    
        $months = Order::select(DB::raw("MONTH(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->pluck('month');
    
        // Inisialisasi array 12 bulan (index 0 untuk Jan, 11 untuk Dec)
        $datas = array_fill(0, 12, 0);
        foreach ($months as $index => $month) {
            $datas[$month - 1] = $users[$index]; // dikurangi 1 karena array dimulai dari index 0
        }

        $vkategori = Kategori::count();
        $vproduk = Produk::count();
        $vorder = Order::count();
        $vuser = User::count();
    
        return view('adminHome', compact('datas', 'vkategori', 'vproduk', 'vorder', 'vuser'));
    }
}
