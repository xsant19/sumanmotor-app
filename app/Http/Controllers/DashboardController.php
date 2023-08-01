<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Motor;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        // $users = User::count();
        $users = User::whereNotIn('id', [1, 3])->count();
        $motors = Motor::count();
        $orders = Order::where('status_order', '!=', 'Selesai')->count();
        $TotalTransaksi = Order::where('status_order', '=', 'Selesai')->sum('total_harga');
        return view('dashboard.components.pages.index-dashboard', compact('users', 'motors', 'orders', 'TotalTransaksi'));
    }
    public function pelanggan(): View
    {
        return view('home.components.pages.pelanggan-home');
    }
}
