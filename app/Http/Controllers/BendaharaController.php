<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratBayar;
use App\Models\Proposal;
use App\Models\LembarPembayaran;

class BendaharaController extends Controller
{
    
    public function store(Request $request, $id){
        $filename = $request->input('id_transaksi').'_'.$request->input('bidang').'_termin '.$request->input('termin').'_'.$request->input('termin').'_surat bayar.'.$request->file('surat_bayar')->extension();
        $filename = strtolower($filename);

        $filepath = strtolower('files/'.$request->input('bidang').'/surat bayar');
        $type = $request->file('surat_bayar')->getClientMimeType();
        $size = $request->file('surat_bayar')->getSize();
        $path = $request->file('surat_bayar')->move($filepath, $filename);

        $changeStatus = Proposal::findOrFail($id);
        if($changeStatus){
            $changeStatus->status = 5;
        }
        $fileCreate = SuratBayar::create([
            'filename' => $filename,
            'type' => $type,
            'size' => $size,
            'folder_path' => $path,
            'proposal_id' => $id,
        ]);

        if($changeStatus && $fileCreate){
            $msg = 'Berhasil Upload Surat Bayar';
        }else{
            $msg = 'Terjadi Kesalahan';
        }

        return redirect()->back()->with(['msg' => $msg]);
    }

    public function pembayaran_index(){
        $proposal = Proposal::all();

        $proposal_need_pembayaran = array();
        foreach($proposal as $x){
            if($x->verifikator_approved == 1 && $x->ketuaharian_approved == 1){
                if(!$x->lembarPembayaran){
                    $x->proposal_file;
                    $x->lembarVerifikasi;
                    $x->suratBayar;
                    $x->approvalKetua;
                    array_push($proposal_need_pembayaran, $x);
                }
            }
        }
        return view('bendahara.pembayaran', ['role' => 'Bendahara', 'proposal' => $proposal_need_pembayaran]);
    }

    public function lembar_pembayaran(Request $request, $id){
        $filename = $request->input('id_transaksi').'_'.$request->input('bidang').'_termin '.$request->input('termin').'_'.$request->input('termin').'_lembar pembayaran.'.$request->file('lembar_pembayaran')->extension();
        $filename = strtolower($filename);

        $filepath = strtolower('files/'.$request->input('bidang').'/lembar pembayaran');
        $type = $request->file('lembar_pembayaran')->getClientMimeType();
        $size = $request->file('lembar_pembayaran')->getSize();
        $path = $request->file('lembar_pembayaran')->move($filepath, $filename);

        $changeStatus = Proposal::findOrFail($id);
        if($changeStatus){
            $changeStatus->status = 5;
        }
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

        if($changeStatus && $fileCreate){
            $msg = 'Berhasil Upload Surat Bayar';
        }else{
            $msg = 'Terjadi Kesalahan';
        }

        return redirect()->back()->with(['msg' => $msg]);
    }
}