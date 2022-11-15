<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\Surat;
use App\Models\Tujuan;
use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    public function index()
    {
        $disposisi = Disposisi::all();
        return view('disposisi.index',compact(['disposisi']));
    }

    public function create()
    {
        $surat = Surat::all();
        $suratkeluar = Surat::where('jenis_surat', 'K')
                                    ->get();
        $tujuan = Tujuan::all();
        return view('/disposisi/create', compact(['surat','tujuan','suratkeluar']));
    }

    public function store(Request $request)
    {
        foreach($request->tujuan_id as $idx_tujuan => $id){
            // dump($id);
            $tujuan = Tujuan::where('id',$request->tujuan_id)->select('id', 'tujuan')->get();
            $tujuan_id = [$tujuan];
            // array_push($tujuan, $tujuan_id);
        }
        dump($tujuan_id);

        // $surat = Surat::find($request->surat_id);
        // return $request->tujuan_id;
        // $disposisi = $request->file('dokumen');
        // $nama_disposisi =$request->nama_surat."_"."disposisi"."_".$disposisi->getClientOriginalName();

        // $tujuan_upload_foto = 'disposisi/'.$surat->nomor_surat;
        // $disposisi->move($tujuan_upload_foto,$nama_disposisi);
      
        // $tujuan = Tujuan::find($request->tujuan_id);
        // Disposisi::create([
        //       'nomor_surat' => $surat->nomor_surat,
        //       'surat_id' => $surat->id,
        //       'tujuan_id' =>$tujuan->id,
        //       'tanggal_terima' => $request->tanggal_terima,
        //       'tujuan' => $tujuan->tujuan,
        //       'catatan' => $request->catatan,
        //       'tindak_lanjut' => $request->tindak_lanjut,
        //       'keterangan' => $request->keterangan,
        //       'dokumen' => $nama_disposisi,
        // ]);
        // return redirect('/disposisi/index');
    }

    public function edit($id)
    {
        $surat = Surat::all();
        $suratkeluar = Surat::where('jenis_surat', 'K')
                                    ->get();
        $tujuan = Tujuan::all();
        $disposisi = Disposisi::find($id);
        return view('disposisi.edit', compact(['disposisi', 'suratkeluar', 'surat','tujuan' ]));
    }

    public function update($id, Request $request)
    {
        $disposisi =Disposisi::find($id);
        $disposisi->update($request->except(['_token', 'submit']));
        return redirect('/disposisi/index');
    }

    public function destroy($id)
    {
        $disposisi = Disposisi::find($id);
        $disposisi->delete();
        return redirect('/disposisi/index');
    }
}
