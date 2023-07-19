<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function kontak()
    {
        return view('home.components.pages.kontakkami-home');
    }
    public function faq()
    {
        return view('home.components.pages.faq-home');
    }
    public function tentangkami()
    {
        return view('home.components.pages.tentangkami-home');
    }

    public function testdashboard()
    {
        return view('dashboard.user.pages.index');
    }
}
