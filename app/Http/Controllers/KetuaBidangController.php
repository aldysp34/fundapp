<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Spj;
use App\Models\SpjFile;
use App\Models\SpjExcel;

class KetuaBidangController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function new_proposal(){
        return view('ketuabidang.proposal_index', ['role' => 'Ketua Bidang']);
    }

    public function upload_spj(Request $request){
        $createSpj = Spj::create([
            'id_transaksi' => $request->input('id_transaksi'),
            'nominal_spj' => $request->input('nominal_spj'),
            'deskripsi' => $request->input('deskripsi'),
            'status' => 1,
            'verifikator_approved' => 0,
            'alasan_verifikator' => '',
            'ketuaharian_approved' => 0,
            'alasan_ketuaharian' => '',
            'termin' => 1
        ]);

        $filename = $request->input('id_transaksi').'_'.$request->input('bidang').'_termin_'.$request->input('termin').'_spj.'.$request->file('spj_file')->extension();
        $filename = strtolower($filename);

        $filepath = strtolower('files/'.$request->input('bidang').'/spj');
        $type = $request->file('verifikasi_spj')->getClientMimeType();
        $size = $request->file('verifikasi_spj')->getSize();
        $path = $request->file('verifikasi_spj')->move($filepath, $filename);

        $createFile = SpjFile::create([
            'filename' => $filename,
            'type' => $type,
            'size' => $size,
            'folder_path' => $path,
            'spj_id' => $createSpj->id,
        ]);

        $createExcel = SpjExcel::create([
            'filename' => $filename,
            'type' => $type,
            'size' => $size,
            'folder_path' => $path,
            'spj_id' => $createSpj->id,
        ]);

        return redirect()->back()->with(['msg' => 'Berhasil Menambahkan Data']);

    }

    public function new_spj(){
        return view('ketuabidang.spj_index', ['role' => 'Ketua Bidang']);
    }
    public function detail_proposal($id){
        $proposal = Proposal::where('id', $id)->first();
        $role = auth()->user()->user_access;
        if($role == 0){
            $role = 'Ketua Bidang';
        }else if($role == 1){
            $role = 'Verifikator';
        }else if($role == 2){
            $role = 'Bendahara';
        }else if($role == 3){
            $role = 'Ketua Harian';
        }else if($role == 4){
            $role = 'Admin';
        }

        return view('ketuabidang.detail_proposal', ['proposal' => $proposal, 'role' => $role]);
    }

    public function detail_spj($id){
        $spj = Spj::where('id', $id)->first();

        return view('ketuabidang.detail_spj', ['spj' => $spj]);
    }

    

}
