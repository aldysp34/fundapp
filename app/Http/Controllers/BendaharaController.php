<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratBayar;
use App\Models\Proposal;
use App\Models\LembarPembayaran;

class BendaharaController extends Controller
{
    
    public function store(Request $request, $id){
        $file = Proposal::findOrFail($id)->first();
        $filename = $file->id_transaksi.'_'.$file->bidang->name.'_termin '.$file->termin.'_surat bayar.'.$request->file('surat_bayar')->extension();
        $filename = strtolower($filename);

        $filepath = strtolower('files/'.$file->bidang->name.'/surat bayar');
        $type = $request->file('surat_bayar')->getClientMimeType();
        $size = $request->file('surat_bayar')->getSize();
        $path = $request->file('surat_bayar')->move($filepath, $filename);

        $file->status = 6;
        $file->save();

        $fileCreate = SuratBayar::create([
            'filename' => $filename,
            'type' => $type,
            'size' => $size,
            'folder_path' => $path,
            'proposal_id' => $id,
        ]);

        if($file && $fileCreate){
            $msg = 'Berhasil Upload Surat Bayar';
        }else{
            $msg = 'Terjadi Kesalahan';
        }

        return redirect()->route('bendahara.home')->with(['msg' => $msg]);
    }

    public function detail_suratbayar($id){
        $proposal = Proposal::findOrFail($id)->first();

        return view('bendahara.suratbayar', ['role' => 'Bendahara', 'x' => $proposal]);
    }

    public function detail_pembayaran($id){
        $proposal = Proposal::findOrFail($id)->first();

        return view('bendahara.detail_pembayaran', ['role' => 'Bendahara', 'x' => $proposal]);
    }

    

    public function lembar_pembayaran(Request $request, $id){
        // dd($request->all());
        $file = Proposal::findOrFail($id);
        $filename = $file->id_transaksi.'_'.$file->bidang->name.'_termin '.$file->termin.'_lembar pembayaran.'.$request->file('lembar_pembayaran')->extension();
        $filename = strtolower($filename);

        $filepath = strtolower('files/'.$file->bidang->name.'/lembar pembayaran');
        $type = $request->file('lembar_pembayaran')->getClientMimeType();
        $size = $request->file('lembar_pembayaran')->getSize();
        $path = $request->file('lembar_pembayaran')->move($filepath, $filename);

        
        $fileCreate = LembarPembayaran::create([
            'nama_penerima' => $request->input('nama_penerima'),
            'npwp_penerima' => $request->input('npwp_penerima'),
            'alamat_penerima' => $request->input('alamat_penerima'),
            'rekening_penerima' => $request->input('rekening_penerima'),
            'bank' => $request->input('bank'),
            'keterangan' => $request->input('keterangan'),
            'nominal' => $request->input('nominal'),
            'date_of_transaction' => $request->input('date'),
            'filename' => $filename,
            'type' => $type,
            'size' => $size,
            'proposal_id' => $id,
            'folder_path' => $path
        ]);

        if($fileCreate){
            $msg = 'Berhasil Upload Lembar Pembayaran';
        }else{
            $msg = 'Terjadi Kesalahan';
        }

        return redirect()->route('bendahara.home')->with(['msg' => $msg]);
    }
}
