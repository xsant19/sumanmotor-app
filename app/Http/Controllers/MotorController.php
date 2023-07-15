<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function viewmotoruser()
    {
        $motors = Motor::all();
        return view('home.components.pages.motor-home', compact('motors'));
    }
}
