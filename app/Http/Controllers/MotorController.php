<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MotorController extends Controller
{

    public function index(Request $request)
    {
        // Fitur Pencarian data berdasarkan input pengguna yang difilter berdasarkan nama pada tabel users
        $keyword = @$request['search'];
        $motors = new Motor();
        if (isset($request['search'])) {
            $motors = $motors->whereIn('user_id', function ($query) use ($keyword) {
                $query->select('id')
                    ->from('users')
                    ->where('nama', 'LIKE', "%$keyword%");
            });
        }
        $motors = $motors->paginate(5);
        return view('dashboard.components.pages.motor.index-motor', compact('motors', 'keyword'));
    }



    public function viewMotorUser(Request $request)
    {
        // Mendapatkan nilai dari parameter "search" dari request dan menyimpannya dalam variabel $search
        $search = @$request['search'];
        // Mengambil data motor milik pengguna yang sedang login melalui relasi "motors" (diasumsikan ada relasi "motors" pada model User)
        $motors = Auth::user()->motors();
        // Jika ada nilai pada variabel $search, maka dilakukan filtering data motor berdasarkan nilai tersebut menggunakan WHERE clause.
        if (isset($search)) {
            $motors = $motors->where('no_polisi', 'LIKE', "%$search%")
                ->orWhere('nama', 'LIKE', "%$search%")->orWhere('merk_motor', 'LIKE', "%$search%")
                ->orWhere('jenis_motor', 'LIKE', "%$search%");
        }
        // Menggunakan pagination dengan menampilkan 5 data motor per halaman
        $motors = $motors->paginate(5);
        return view('home.components.pages.motor-home', compact('motors'));
    }


    public function view($id)
    {
        $motor =  Motor::find($id);
        return view('dashboard.components.pages.motor.detail-motor', compact('motor'));
    }

    public function create()
    {
        $users = User::whereNotIn('id', [1, 3])->get();
        return view('dashboard.components.pages.motor.create-motor', compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'merk_motor' => 'required',
            'jenis_motor' => 'required',
            'no_polisi' => 'required | unique:motors,no_polisi',
            'user_id' => 'required',
        ]);

        Motor::create($request->all());

        return redirect()->route('motors.index')
            ->with('success', 'Data motor berhasil ditambahkan');
    }


    public function edit(Motor $motor)
    {
        return view('dashboard.components.pages.motor.edit-motor', compact('motor'));
    }

    public function update(Request $request, Motor $motor)
    {
        $request->validate([
            'nama' => 'required',
            'merk_motor' => 'required',
            'jenis_motor' => 'required',
            'no_polisi' => 'required',
            'user_id' => 'required',
        ]);

        $motor->update($request->all());

        return redirect()->route('motors.index')
            ->with('success', 'Data Motor berhasil diperbarui');
    }

    public function destroy(Motor $motor)
    {
        $motor->delete();

        return redirect()->route('motors.index')
            ->with('success', 'Data Motor berhasil terhapus');
    }

    public function getMotorByUser(Request $request)
    {
        $user_id = $request['user_id'];
        $motors = Motor::where('user_id', $user_id)->get();

        return response()->json($motors);
    }
}
