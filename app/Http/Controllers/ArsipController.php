<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function index()
    {
        // $pageConfigs = ['showMenu' => true];
        // $pageConfigs = ['blankPage' => true];
        $arsip = Arsip::all();
        return view('arsip.index', compact(['arsip']));
    }
}
