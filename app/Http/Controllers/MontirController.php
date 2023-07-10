<?php

namespace App\Http\Controllers;

use App\Models\Montir;
use Illuminate\Http\Request;

class MontirController extends Controller
{
    public function index()
    {
        $montirs = Montir::all();

        return view('dashboard.components.pages.montir.index-montir', compact('montirs'));
    }

    public function create()
    {
        return view('dashboard.components.pages.montir.create-montir');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        Montir::create($request->all());

        return redirect()->route('montirs.index')
            ->with('success', 'Montir created successfully.');
    }

    public function edit(Montir $montir)
    {
        return view('dashboard.components.pages.montir.edit-montir', compact('montir'));
    }

    public function update(Request $request, Montir $montir)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $montir->update($request->all());

        return redirect()->route('montirs.index')
            ->with('success', 'Montir updated successfully');
    }

    public function destroy(Montir $montir)
    {
        $montir->delete();

        return redirect()->route('montirs.index')
            ->with('success', 'Montir deleted successfully');
    }
}
