<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\LembarVerifikasi;
use App\Models\Spj;
use App\Models\LembarVerifikasiSpj;
use App\Models\SpjExcel;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ExcelData;
use App\Imports\ExcelDataImport;


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

        $filename = $file->id_transaksi.'_'.$file->bidang->name.'_termin '.$file->termin.'_lembar verifikasi.'.$request->file('lembar_verifikasi')->extension();
        $filename = strtolower($filename);

        $filepath = strtolower('files/'.$file->bidang->name.'/lembar verifikasi');
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
        return redirect()->route('verifikator.home')->with(['msg_approveReject' => $msg]);
    }

    public function detail_proposal($id){
        $proposal = Proposal::where('id', $id)->first();
        $proposal->proposal_file;

        return view('verifikator.detail_proposal', ['role' => 'Verifikator', 'proposal' => $proposal]);
    }

    public function approvedRejectedSpj(Request $request, $id){
        $file = Spj::findOrFail($id);
        $data = $request->input('action');
        if($file){
            $file->verifikator_approved = $data;
            $file->nominal_verifikasi = $request->input('nominal_verifikasi');
            $file->alasan_verifikator = $request->input('alasan_verifikator');
            $file->save();
        }

        if($data == 1){
            $msg = 'Berhasil Approve Proposal';
            $file->status = 3;
            $file->save();
        }else if($data == 2){
            $msg = 'Berhasil Reject Proposal';
            $file->status = 4;
            $file->save();
        }

        $filename = $file->id_transaksi.'_'.$file->bidang->name.'_termin_'.$request->input('termin').'_lembar verifikasi spj.'.$request->file('verifikasi_spj')->extension();
        $filename = strtolower($filename);

        $filepath = strtolower('files/'.$file->bidang->name.'/lembar verifikasi spj');
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
        return redirect()->route('verifikator.home')->with(['msg_approveReject' => $msg]);
    }
    public function detail_spj($id){
        $spj = Spj::where('id', $id)->first();
        $spj->spj_file;

        $excelFile = SpjExcel::where('spj_id', $id)->first();
        $filepath = public_path().'/'.$excelFile->folder_path;
        
        if(strpos($filepath, '.xls') || strpos($filepath, '.csv')){
            ExcelData::truncate();
            $excelData = Excel::import(new ExcelDataImport, $filepath);
    
            $excelDataFromDB = ExcelData::all();
        }

        if(isset($excelDataFromDB)){
            return view('verifikator.detail_spj', ['spj' => $spj, 'role' => 'Verifikator', 'excelData' => $excelDataFromDB]);
        }
        return view('verifikator.detail_spj', ['spj' => $spj, 'role' => 'Verifikator']);
    }
}
