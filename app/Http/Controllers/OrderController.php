<?php

namespace App\Http\Controllers;

use App\Models\Montir;
use Carbon\Carbon;
use App\Models\Motor;
use App\Models\Order;
use App\Models\Service;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::where('status_order', '!=', 'Selesai')->paginate(5);
        return view('dashboard.components.pages.order.index-order', compact('orders'));
    }

    public function detail($id)
    {
        $order =  Order::find($id);
        //Mengambil Data Motor yang dimiliki oleh user
        $motors = Motor::where('user_id', $order->user_id)->get();
        // Mengambil Data Services sesuai dengan Order Yang Dipilih
        $services = Service::where('order_id', $id)->get();
        $montirs = Montir::all();

        //Compact Membuat Bentuk data menjadi array dengan key sesuai dengan nama variable
        return view('dashboard.components.pages.order.detail-order', compact('order', 'motors', 'montirs', 'services'));
    }

    public function confirm($id, Request $request)
    {
        $order =  Order::find($id);
        $order->status_order = 'Sedang Diproses';
        $order->montir_id = $request['montir_id'];
        $order->save();
        return redirect()->route('orders.detail', ['id' => $id]);
    }

    public function edit($id, Request $request)
    {
        $order =  Order::find($id);
        $order->kendala = $request['kendala'];
        $order->montir_id = $request['montir_id'];
        $order->save();
        // return redirect()->route('orders.detail', ['id' => $id])->with('success', 'Data Order Berhasil Ditambahkan');;
        return redirect()->route('orders.index')->with('success', 'Data Order Berhasil Ditambahkan');;
    }

    // public function progress($id)
    // {
    //     $order =  Order::find($id);
    //     return view('dashboard.components.pages.order.progress-order', compact('order'));
    // }

    public function close($id)
    {
        $order =  Order::find($id);
        $order->status_order = 'Selesai';
        $order->save();
        return redirect()->route('riwayats.index')->with('success', 'Data Order Telah Berhasil Diselesaikan');;
    }

    public function createorderuser()
    {
        return view('home.components.pages.order-home');
    }

    public function createOrderUserMotor($id)
    {
        $motor =  Motor::find($id);
        return view('home.components.pages.motor-order-home', compact('motor'));
    }

    public function storeOrderUser($id, Request $request)
    {
        $motor =  Motor::find($id);
        //Acuan tanggal order : Jika order hari ini setelah jam 6 sore saat ini dihitung hari ini , jika order sebelum jam 6 sore maka dihitung orderan kemarin
        $date_start = Carbon::now('+8')->format('H') > 18 ? Carbon::now('+8')->hour(18)->minute(0)->second(0) : Carbon::now('+8')->hour(18)->minute(0)->second(0)->subDay();
        $order_count = Order::where('tanggal_order', '>=', $date_start->format('Y-m-d H:i:s'))->count();

        // Membuat no order random yang diawali huruf SMN ditambah 3 random string  ditambah Tanggal,jam,menit dan detik
        $order = new Order();
        $randomString = Str::random(3);
        $order->no_order = 'SMN' . strtoupper($randomString) . Carbon::now()->format('dHis');

        $order->no_antri = $order_count + 1;
        $order->tanggal_order = Carbon::now('+8');
        $order->motor_id = $motor->id;
        $order->kendala = $request['kendala'];
        $order->user_id = Auth::user()->id;
        $order->save();

        return redirect()->route('riwayat.byuser')
            ->with('success', 'Data Order Berhasil dibuat , silahkan tunggu');
    }

    public function store(Request $request)
    {
        // Nama Model -> Column pada database = Mengisi Value dengan data dari name pada form ()
        $motor = new Motor();
        $motor->user_id = Auth::user()->id;
        $motor->nama = $request['nama'];
        $motor->merk_motor = $request['merk_motor'];
        $motor->jenis_motor = $request['jenis_motor'];
        $motor->no_polisi = $request['no_polisi'];
        $motor->save();

        //Acuan tanggal order : Jika order hari ini setelah jam 6 sore saat ini dihitung hari ini , jika order sebelum jam 6 sore maka dihitung orderan kemarin
        $date_start = Carbon::now('+8')->format('H') > 18 ? Carbon::now('+8')->hour(18)->minute(0)->second(0) : Carbon::now('+8')->hour(18)->minute(0)->second(0)->subDay();
        $order_count = Order::where('tanggal_order', '>=', $date_start->format('Y-m-d H:i:s'))->count();


        // Membuat no order random yang diawali huruf SMN ditambah 3 random string  ditambah Tanggal,jam,menit dan detik
        $order = new Order();
        $randomString = Str::random(3);
        $order->no_order = 'SMN' . strtoupper($randomString) . Carbon::now()->format('dHis');

        //Fungsi Order
        $order->no_antri = $order_count + 1;
        $order->tanggal_order = Carbon::now('+8');
        $order->kendala = $request['kendala'];
        $order->motor_id = $motor->id;
        $order->user_id = Auth::user()->id;
        $order->save();

        // $request->validate([
        //     'no_polisi' => 'unique:App\Models\Motor,no_polisi'
        // ]);

        return redirect()->route('riwayat.byuser')
            ->with('success', 'Data Order Berhasil dibuat , silahkan tunggu');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')
            ->with('success', 'Data Order Berhasil Dihapus');
    }
}
