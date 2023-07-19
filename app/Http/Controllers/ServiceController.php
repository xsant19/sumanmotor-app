<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // public function index()
    // {
    //     $services = Service::all();


    // }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'jenis_service' => 'required',
            'harga_service' => 'required',
            'deskripsi' => 'required',
        ]);
        Service::create($request->all());
        return redirect()->route('orders.detail', ['id' => $request->order_id])
            ->with('success', 'Data Services Berhasil Ditambahkan');
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'order_id' => 'required',
            'jenis_service' => 'required',
            'harga_service' => 'required',
            'deskripsi' => 'required',
        ]);

        $service->update($request->all());

        return redirect()->route('orders.detail', ['id' => $request->order_id])
            ->with('success', 'Data Services Berhasil Diperbarui');
    }
}
