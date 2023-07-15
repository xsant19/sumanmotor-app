<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{


    public function index()
    {
        $motors = Motor::all();

        return view('dashboard.components.pages.motor.index-motor', compact('motors'));
    }

    public function viewmotoruser()
    {
        $motors = Motor::all();
        return view('home.components.pages.motor-home', compact('motors'));
    }

    public function view()
    {
        // $motors = Motor::all();
        // return view('dashboard.components.pages.motor.view-motor', compact('motors'));
    }

    public function create()
    {
        // return view('dashboard.components.pages.motor.create-motor');
    }


    public function store(Request $request)
    {
        // $request->validate([
        //     'nama' => 'required',
        //     'merk_motor' => 'required',
        //     'jenis_motor' => 'required',
        //     'no_polisi' => 'required',
        //     'user_id' => 'required',
        // ]);

        // Motor::create($request->all());

        // return redirect()->route('motors.index')
        //     ->with('success', 'Data motor berhasil ditambahkan');
    }


    public function edit(Motor $motor)
    {
        // return view('dashboard.components.pages.motor.edit-motor', compact('motor'));
    }



    public function update(Request $request, Motor $motor)
    {
        // $request->validate([
        //     'nama' => 'required',
        //     'alamat' => 'required',
        //     'no_telp' => 'required',
        // ]);

        // $motor->update($request->all());

        // return redirect()->route('motors.index')
        //     ->with('success', 'Data Motor berhasil diperbarui');
    }

    public function destroy(Motor $motor)
    {
        // $motor->delete();

        // return redirect()->route('motors.index')
        //     ->with('success', 'Data Motor berhasil terhapus');
    }
}
