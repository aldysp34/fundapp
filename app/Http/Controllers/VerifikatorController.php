<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\LembarVerifikasi;
use App\Models\Spj;
use App\Models\LembarVerifikasiSpj;

class VerifikatorController extends Controller
{
    public function approvedRejectedProposal(Request $request, $id){
        $file = Proposal::findOrFail($id);
        if(!$request->has('lembar_verifikasi')){
            return redirect()->back()->withErrors('Silahkan Masukkan file Lembar Verifikasi');
        }
        $data = $request->input('action');
        if($file){
            $file->verifikator_approved = $data;
            $file->jumlah_approval = $request->input('jumlah_approval');
            $file->alasan_verifikator = $request->input('alasan_verifikator');
            $file->save();
        }

        if($data == 1){
            $msg = 'Berhasil Approve Proposal';
            $file->status = 2;
            $file->save();
        }else if($data == 2){
            $msg = 'Berhasil Reject Proposal';
            $file->status = 4;
            $file->save();
        }

        $filename = $request->input('id_transaksi').'_'.$request->input('bidang').'_termin '.$request->input('termin').'_'.$request->input('termin').'_lembar verifikasi.'.$request->file('lembar_verifikasi')->extension();
        $filename = strtolower($filename);

        $filepath = strtolower('files/'.$request->input('bidang').'/lembar verifikasi');
        $type = $request->file('lembar_verifikasi')->getClientMimeType();
        $size = $request->file('lembar_verifikasi')->getSize();
        $path = $request->file('lembar_verifikasi')->move($filepath, $filename);
        $verifikasiCreate = LembarVerifikasi::create([
            'filename' => $filename,
            'type' => $type,
            'size' => $size,
            'folder_path' => $path,
            'proposal_id' => $id,
        ]);
        return redirect()->back()->with(['msg_approveReject' => $msg]);
    }

    public function approvedRejectedSpj(Request $request, $id){
        $file = Spj::findOrFail($id);
        if($file){
            $file->verifikator_approved = $data;
            $file->nominal_verifikasi = $request->input('nominal_verifikasi');
            $file->alasan_verifikator = $request->input('alasan_verifikator');
            $file->save();
        }

        if($data == 1){
            $msg = 'Berhasil Approve Proposal';
            $file->status = 2;
            $file->save();
        }else if($data == 2){
            $msg = 'Berhasil Reject Proposal';
            $file->status = 4;
            $file->save();
        }

        $filename = $request->input('id_transaksi').'_'.$request->input('bidang').'_termin_'.$request->input('termin').'_lembar verifikasi spj.'.$request->file('verifikasi_spj')->extension();
        $filename = strtolower($filename);

        $filepath = strtolower('files/'.$request->input('bidang').'/lembar verifikasi spj');
        $type = $request->file('verifikasi_spj')->getClientMimeType();
        $size = $request->file('verifikasi_spj')->getSize();
        $path = $request->file('verifikasi_spj')->move($filepath, $filename);
        $verifikasiCreate = LembarVerifikasiSpj::create([
            'filename' => $filename,
            'type' => $type,
            'size' => $size,
            'folder_path' => $path,
            'spj_id' => $id,
        ]);
        return redirect()->back()->with(['msg_approveReject' => $msg]);
    }
}
