<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use App\Models\Surat;

class SuratController extends Controller
{
    public function index()
    {
        // $pageConfigs = ['showMenu' => true];
        $surat = Surat::all();
        $suratmasuk = Surat::where('jenis_surat', 'M')
                                ->where('klasifikasi', 'U')
                                    ->get();
        $suratkeluar = Surat::where('jenis_surat','K')
                                ->where('klasifikasi', 'U')
                                    ->get();

        return view('surat.index',compact(['surat','suratkeluar','suratmasuk']));
    }
    public function indexPenting(Request $request)
    {
        $surat = Surat::find($request->klasifikasi);
        $suratPenting = Surat::where('klasifikasi', 'P')
                                    ->get();
        return view('penting.index', compact('surat', 'suratPenting'));
    }

    public function create($jenis_surat, Request $request)
    {
        // return $jenis_surat;
        $dokumen = Dokumen::all();
        $surat = Surat::all();
        $dokumenUmum = Dokumen::where('klasifikasi', 'U')
                                    ->get();
        $dokumenPenting = Dokumen::where('klasifikasi', 'P')
                                    ->get();
        return view('/surat/create', compact(['dokumen', 'surat','dokumenUmum','dokumenPenting', 'jenis_surat']));
    }

    public function store( Request $request)
    {
        $dokumen = Dokumen::find($request->dokumen_id);
        Surat::create([
            'nama_dokumen' => $dokumen->nama_dokumen,
            'dokumen_id' => $dokumen->id,
            'nomor_surat' =>$request->nomor_surat,
            'tanggal' => $request->tanggal,
            'dari' => $request->dari,
            'tujuan_surat' =>$request->tujuan_surat,
            'sifat' => $request->sifat,
            'jenis_surat' =>$request->jenis_surat,
            'klasifikasi' =>$dokumen->klasifikasi,
            'perihal' => $request->perihal,
            'keterangan' => $request->keterangan,
            'dokumen' => $request->dokumen,

        ]);
        if($dokumen->klasifikasi == "P"){
            return redirect('/penting/index');
        }else{
            return redirect('/surat/index');
        }
    }

    public function destroy($id)
    {
        $surat = Surat::find($id);
        $surat->delete();
        return redirect()->back();
    }
}
