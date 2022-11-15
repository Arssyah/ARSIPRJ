<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\Ekspedisi;

class EkspedisiController extends Controller
{
    public function index()
    {
        // $pageConfigs = ['showMenu' => true];
        // return view('ekspedisi.index', ['pageConfigs' => $pageConfigs]);
        $ekspedisi = Ekspedisi::all();
        $ekspedisiEks = Ekspedisi::where('jenis', 'E')
                                            ->get();
        $ekspedisiIn = Ekspedisi::where('jenis', 'I')
                                            ->get();
        return view('ekspedisi.index', compact(['ekspedisi','ekspedisiIn', 'ekspedisiEks']));
    }

    public function create($jenis)
    {
        $ekspedisi = Ekspedisi::all();
        return view('/ekspedisi/create', compact(['ekspedisi', 'jenis']));
    }

    public function store(Request $request)
    {
        Ekspedisi::create([
            'tanggal_kirim' => $request->tanggal_kirim,
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'perihal' => $request->perihal,
            'jenis' => $request->jenis,
            'nama_penerima' => $request->nama_penerima
        ]);
        return redirect('/ekspedisi/index');
    }

    public function edit($id)
    {
        $ekspedisi = Ekspedisi::find($id);
        return view('ekspedisi.edit',compact(['ekspedisi']));
    }

    public function update($id, Request $request)
    {
        $ekspedisi = Ekspedisi::find($id);
        $ekspedisi->update([
            'tanggal_kirim' => $request->tanggal_kirim,
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'perihal' => $request->perihal,
            'jenis' => $request->jenis,
            'nama_penerima' => $request->nama_penerima
        ]);
        return redirect('/ekspedisi/index');
    }

    public function destroy($id)
    {
        $ekspedisi = Ekspedisi::find($id);
        $ekspedisi->delete();
        return redirect('/ekspedisi/index');
    }
}
