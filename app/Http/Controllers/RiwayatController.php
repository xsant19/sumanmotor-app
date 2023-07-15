<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $orders = Order::where('status_order', '=', 'Selesai')->get();
        return view('dashboard.components.pages.riwayat.index-riwayat', compact('orders'));
    }
}
