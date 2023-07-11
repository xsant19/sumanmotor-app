<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Motor;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function createorderuser()
    {
        return view('home.components.pages.order-home');
    }

    public function store(Request $request)
    {
        $motor = new Motor();
        // Nama Model -> Column pada database = Mengisi Value dengan data dari name pada form ()
        $motor->user_id = Auth::user()->id;
        $motor->nama = $request['nama'];
        $motor->merk_motor = $request['merk_motor'];
        $motor->jenis_motor = $request['jenis_motor'];
        $motor->no_polisi = $request['no_polisi'];
        $motor->save();

        //Acuan tanggal order : Jika order hari ini setelah jam 6 sore saat ini dihitung hari ini , jika order sebelum jam 6 sore maka dihitung orderan kemarin
        $date_start = Carbon::now('+8')->format('H') > 18 ? Carbon::now('+8')->hour(18)->minute(0)->second(0) : Carbon::now()->hour(18)->minute(0)->second(0)->subDay();
        $order_count = Order::where('created_at', '>=', $date_start->format('Y-m-d H:i:s'))->count();


        $order = new Order();
        // Membuat no order random yang diawali huruf SMN ditambah 3 random string  ditambah Tanggal,jam,menit dan detik
        $randomString = Str::random(3);
        $order->no_order = 'SMN' . strtoupper($randomString) . Carbon::now()->format('dHis');
        //pengingat
        $order->no_antri = $order_count + 1;
        $order->tanggal_order = Carbon::now('+8')->format('Y-m-d');
        $order->kendala = $request['kendala'];
        $order->motor_id = $motor->id;
        $order->user_id = Auth::user()->id;
        $order->save();

        return redirect()->route('riwayat.home')
            ->with('success', 'Data Order created successfully.');
    }

    public function riwayathome()
    {
        $orders = Order::where('user_id', '=', Auth::user()->id)->get();
        return view('home.components.pages.riwayat-home', compact('orders'));
    }
}
