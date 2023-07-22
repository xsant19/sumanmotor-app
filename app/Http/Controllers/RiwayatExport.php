<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Http\Request;

class RiwayatExport implements FromView
{
    public $orders;

    public function  __construct($orders)
    {
        $this->orders = $orders;
    }

    public function view(): View
    {
        $orders = $this->orders;
        // $tglawal = Carbon::parse($request['tglawal'])->startOf('day')->toDateTimeString();
        // $tglakhir = Carbon::parse($request['tglakhir'])->endOf('day')->toDateTimeString();
        return view('dashboard.components.pages.riwayat.excel-riwayat', compact('orders'));
    }
    // 'orders', 'service' => $orders = Order::where('status_order', '=', 'Selesai')->whereBetween('tanggal_order', [$tglawal, $tglakhir])->get()
}
