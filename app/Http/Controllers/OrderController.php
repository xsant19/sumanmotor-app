<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Motor;
use App\Models\Order;
use App\Models\Montir;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::where('status_order', '!=', 'Selesai')->paginate(15);
        return view('dashboard.components.pages.order.index-order', compact('orders'));
    }

    // Function untuk menampilkan view tambah data Order yang dibuat oleh admin
    public function create()
    {
        // $order =  Order::all();
        $montirs = Montir::all();
        $motors = Motor::all();
        $services = [];
        // $users = User::where('id', '!=', 1)->get();
        $users = User::whereNotIn('id', [1, 3])->get();
        return view('dashboard.components.pages.order.create-order', compact('users', 'montirs', 'motors', 'services'));
    }

    // Function untuk mengirim data order yang akan ditambahkan oleh admin
    public function storeOrderAdmin(Request $request)
    {
        //Acuan tanggal order : Jika order hari ini setelah jam 6 sore saat ini dihitung hari ini , jika order sebelum jam 6 sore maka dihitung orderan kemarin
        $date_start = Carbon::now('+8')->format('H') > 18 ? Carbon::now('+8')->hour(18)->minute(0)->second(0) : Carbon::now('+8')->hour(18)->minute(0)->second(0)->subDay();
        $order_count = Order::withTrashed()->where('tanggal_order', '>=', $date_start->format('Y-m-d H:i:s'))->count();

        // Membuat no order random yang diawali huruf SMN ditambah 3 random string  ditambah Tanggal,jam,menit dan detik
        $order = new Order();
        $randomString = Str::random(3);
        $order->no_order = 'SMN' . strtoupper($randomString) . Carbon::now('Asia/Makassar')->format('dHis');

        $order->no_antri = $order_count + 1;
        $order->tanggal_order = Carbon::now('+8');
        $order->motor_id = $request['motor_id'];
        $order->kendala = $request['kendala'];
        $order->status_order = 'Sedang Diproses';
        $order->user_id = $request['user_id'];
        $order->montir_id = $request['montir_id'];
        $order->save();

        // $order->services()->createMany($request['service']);

        // Cek apakah ada data service sebelum menyimpan
        if ($request->has('service') && is_array($request['service'])) {
            // Simpan data service jika ada
            $order->services()->createMany($request['service']);
        }

        return redirect()->route('admin.orders.index')->with('success', 'Data Order Berhasil Ditambahkan');
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

    // Funciton untuk mengirim konfirmasi status order jika ingin di acc oleh admin
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
        return redirect()->route('admin.orders.index')->with('success', 'Data Order Berhasil Diedit');;
    }

    // Function untuk mengirim konfirmasi status order jika order telah selesai dan akan menjadi riwayat transaksi
    public function close($id)
    {
        $order =  Order::find($id);
        $order->status_order = 'Selesai';
        $order->save();
        return redirect()->route('riwayats.index')->with('success', 'Data Order Telah Berhasil Diselesaikan');;
    }

    //Function untuk menampilkan view tambah data order dari user yg belum memiliki data motor
    public function createOrderByUser()
    {
        return view('home.components.pages.order-home');
    }

    // Function untuk menampilkan view tambah data order dari motor user
    public function createOrderUserByMotor($id)
    {
        $motor =  Motor::find($id);
        return view('home.components.pages.motor-order-home', compact('motor'));
    }

    // Function untuk Store Order dari USER yang sudah memiliki Data Motor
    public function storeOrderUserByMotor($id, Request $request)
    {
        $motor =  Motor::find($id);
        //Acuan tanggal order : Jika order hari ini setelah jam 6 sore saat ini dihitung hari ini , jika order sebelum jam 6 sore maka dihitung orderan kemarin
        $date_start = Carbon::now('+8')->format('H') > 18 ? Carbon::now('+8')->hour(18)->minute(0)->second(0) : Carbon::now('+8')->hour(18)->minute(0)->second(0)->subDay();
        $order_count = Order::withTrashed()->where('tanggal_order', '>=', $date_start->format('Y-m-d H:i:s'))->count();

        // Membuat no order random yang diawali huruf SMN ditambah 3 random string  ditambah Tanggal,jam,menit dan detik
        $order = new Order();
        $randomString = Str::random(3);
        $order->no_order = 'SMN' . strtoupper($randomString) . Carbon::now('Asia/Makassar')->format('dHis');

        $order->no_antri = $order_count + 1;
        $order->tanggal_order = Carbon::now('+8');
        $order->motor_id = $motor->id;
        $order->kendala = $request['kendala'];
        $order->user_id = Auth::user()->id;
        $order->save();

        return redirect()->route('riwayats.indexUser')
            ->with('success', 'Data Order Berhasil dibuat , silahkan tunggu');
    }

    // Function untuk Store Order dari USER tanpa Motor
    public function store(Request $request)
    {
        $request->validate([
            'no_polisi' => 'required|unique:motors,no_polisi',
            // 'email' => 'required|email|unique:users,email,' . $motor->id,
        ]);

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
        $order_count = Order::withTrashed()->where('tanggal_order', '>=', $date_start->format('Y-m-d H:i:s'))->count();


        // Membuat no order random yang diawali huruf SMN ditambah 3 random string  ditambah Tanggal,jam,menit dan detik
        $order = new Order();
        $randomString = Str::random(3);
        $order->no_order = 'SMN' . strtoupper($randomString) . Carbon::now('Asia/Makassar')->format('dHis');

        //Fungsi Order
        $order->no_antri = $order_count + 1;
        $order->tanggal_order = Carbon::now('+8');
        $order->kendala = $request['kendala'];
        $order->motor_id = $motor->id;
        $order->user_id = Auth::user()->id;
        $order->save();

        return redirect()->route('riwayats.indexUser')
            ->with('success', 'Data Order Berhasil dibuat , silahkan tunggu');
    }

    // Function Untuk Delete Order
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')
            ->with('success', 'Data Order Berhasil Dihapus');
    }
}
