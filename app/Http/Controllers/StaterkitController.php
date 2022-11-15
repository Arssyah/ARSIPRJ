<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaterkitController extends Controller
{
    // home
    public function home()
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Beranda"], ['name' => "index"]
        ];
        return view('home', ['breadcrumbs' => $breadcrumbs]);
    }
}
