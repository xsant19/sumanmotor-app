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
            $orders = $orders->where(function ($query) use ($search) {
                $query->where('no_order', 'LIKE', "%$search%")
                    ->orWhere(function ($query) use ($search) {
                        // Ubah format bulan dari Indonesia ke Inggris
                        $search = str_replace(
                            ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                            ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                            $search
                        );
                        $query->whereRaw("DATE_FORMAT(tanggal_order, '%M') LIKE ?", ["%$search%"]);
                    });
            });
        }
        $orders = $orders->orderBy('created_at', 'desc') // Mengurutkan berdasarkan tanggal terbaru
            ->paginate(15);
        return view('dashboard.components.pages.riwayat.index-riwayat', compact('orders'));
    }

    public function indexUser(Request $request)
    {
        $search = @$request['search'];
        $orders = Order::where('user_id', '=', Auth::user()->id);

        if (isset($search)) {
            $orders = $orders->where('no_order', 'LIKE', "%$search%");
        }

        $orders = $orders->orderBy('created_at', 'desc') // Mengurutkan berdasarkan tanggal terbaru
            ->paginate(5);

        return view('home.components.pages.riwayat-home', compact('orders'));
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


    public function exportPdf($id, Request $request)
    {
        $order =  Order::find($id);
        $pdf = Pdf::loadView('dashboard.components.pdf.export-order', ['order' => $order], compact('order'))->setPaper('A4');;
        return $pdf->download('export-order' . Carbon::now()->timestamp . '.pdf');
    }


    // public function export(Request $request)
    // {
    // dd(["Tanggal Awal : " . $tglawal, "Tanggal Akhir: " . $tglakhir]);
    //     $tglawal = Carbon::parse($request['tglawal'])->startOf('day')->toDateTimeString();
    //     $tglakhir = Carbon::parse($request['tglakhir'])->endOf('day')->toDateTimeString();

    //     $orders = Order::where('status_order', '=', 'Selesai')->with('services')->whereBetween('tanggal_order', [$tglawal, $tglakhir])->get();
    //     return Excel::download(new RiwayatExport($orders), 'Laporan-' . Carbon::now()->timestamp . '.xlsx');
    //     return Excel::download(new RiwayatExport($orders), 'Laporan-' . Carbon::now()->timestamp . '.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    // }


    public function export(Request $request)
    {
        $tglawal = Carbon::parse($request->tglawal)->startOf('day')->toDateTimeString();
        $tglakhir = Carbon::parse($request->tglakhir)->endOf('day')->toDateTimeString();

        $orders = Order::where('status_order', '=', 'Selesai')->with('services')->whereBetween('tanggal_order', [$tglawal, $tglakhir])->get();


        $format = $request->get('format'); // ? Mengambil parameter 'format' dari tombol yang ditekan

        if ($format === 'excel') {
            return Excel::download(new RiwayatExport($orders), 'Laporan-' . Carbon::now()->timestamp . '.xlsx');
        } elseif ($format === 'pdf') {
            $pdf = Pdf::loadView('dashboard.components.pages.riwayat.report-riwayat', compact('orders'))->setPaper('A4', 'landscape');;
            return $pdf->download('Laporan-' . Carbon::now()->timestamp . '.pdf');
        }

        return redirect()->back()->with('error', 'Format cetakan tidak valid.');  // ? Handle jika format tidak valid
    }

    // Function Untuk Delete Order
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('riwayats.index')
            ->with('success', 'Data  Riwayat Order Berhasil Dihapus');
    }
}
