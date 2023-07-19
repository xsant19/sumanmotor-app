<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        $orders = Order::where('status_order', '=', 'Selesai')->paginate(5);
        return view('dashboard.components.pages.riwayat.index-riwayat', compact('orders'));
    }


    public function view($id, Request $request)
    {
        $order =  Order::find($id);
        return view('dashboard.components.pages.riwayat.detail-riwayat', compact('order'));
    }

    public function viewUser($id, Request $request)
    {
        $order =  Order::find($id);
        return view('home.components.pages.detail-riwayat-home', compact('order'));
    }

    public function riwayatTransaksiByUserDashboard(Request $request)
    {
        $search = @$request['search'];
        $orders = Order::where('user_id', '=', Auth::user()->id);
        if (isset($search)) {
            $orders = $orders->where('no_order', 'LIKE', "%$search%");
        }
        $orders = $orders->paginate(5);
        return view('home.components.pages.riwayat-home', compact('orders'));
    }

    public function exportPdf($id, Request $request)
    {
        $order =  Order::find($id);
        $pdf = Pdf::loadView('dashboard.components.pdf.export-order', ['order' => $order], compact('order'))->setPaper('A4');;
        return $pdf->download('export-order' . Carbon::now()->timestamp . '.pdf');
    }
}
