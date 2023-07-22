<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::where('status_order', '=', 'Selesai');
        $search = @$request['search'];
        if (isset($search)) {
            $orders = $orders->where('no_order', 'LIKE', "%$search%");
        }
        $orders = $orders->paginate(5);
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


    public function export(Request $request)
    {
        // dd(["Tanggal Awal : " . $tglawal, "Tanggal Akhir: " . $tglakhir]);
        $tglawal = Carbon::parse($request['tglawal'])->startOf('day')->toDateTimeString();
        $tglakhir = Carbon::parse($request['tglakhir'])->endOf('day')->toDateTimeString();

        $orders = Order::where('status_order', '=', 'Selesai')->with('services')->whereBetween('tanggal_order', [$tglawal, $tglakhir])->get();
        return Excel::download(new RiwayatExport($orders), 'invoices.xlsx');
    }

    public function cetakLaporan(Request $request)
    {
        // dd(["Tanggal Awal : " . $tglawal, "Tanggal Akhir: " . $tglakhir]);
        $tglawal = Carbon::parse($request['tglawal'])->startOf('day')->toDateTimeString();
        $tglakhir = Carbon::parse($request['tglakhir'])->endOf('day')->toDateTimeString();

        $orders = Order::where('status_order', '=', 'Selesai')->whereBetween('tanggal_order', [$tglawal, $tglakhir])->get();

        return view('dashboard.components.pages.riwayat.report-riwayat', compact('orders'));
    }
}
