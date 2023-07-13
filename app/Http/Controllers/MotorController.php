<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function viewmotoruser()
    {
        return view('home.components.pages.motor-home');
    }
}
