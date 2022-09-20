<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\ApprovalKetua;
use App\Models\Spj;
use App\Models\SpjExcel;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ExcelData;
use App\Imports\ExcelDataImport;
use App\Models\ApprovalKetuaSpj;

class KetuaHarianController extends Controller
{
    public function approvedRejectedProposal(Request $request, $id){
        $file = Proposal::findOrFail($id);
        
        $data = $request->input('action');
        if($file){
            $file->ketuaharian_approved = $data;
            $file->alasan_ketuaharian = $request->input('alasan_ketuaharian');
            $file->save();
        }

        if($data == 1){
            $msg = 'Berhasil Approve Proposal';
            $file->status = 3;
            $file->save();
        }else if($data == 2){
            $msg = 'Berhasil Reject Proposal';
            $file->status = 5;
            $file->save();
        }

        $filename = $file->id_transaksi.'_'.$file->bidang->name.'_termin '.$file->termin.'_approval_ketua.'.$request->file('approval_ketua')->extension();
        $filename = strtolower($filename);

        $filepath = strtolower('files/'.$file->bidang->name.'/approval_ketua');
        $type = $request->file('approval_ketua')->getClientMimeType();
        $size = $request->file('approval_ketua')->getSize();
        $path = $request->file('approval_ketua')->move($filepath, $filename);
        $verifikasiCreate = ApprovalKetua::create([
            'filename' => $filename,
            'type' => $type,
            'size' => $size,
            'folder_path' => $path,
            'proposal_id' => $id,
        ]);
        return redirect()->route('ketua-harian.home')->with(['msg_approveReject' => $msg]);
    }

    public function detail_proposal($id){
        $proposal = Proposal::where('id', $id)->first();
        $proposal->proposal_file;
        $proposal->lembarVerifikasi;
        $proposal->suratBayar;

        return view('ketuaharian.detail_proposal', ['role' => 'Ketua Harian', 'proposal' => $proposal]);
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
            return view('ketuaharian.detail_spj', ['spj' => $spj, 'role' => 'Ketua Harian', 'excelData' => $excelDataFromDB]);
        }
        return view('ketuaharian.detail_spj', ['spj' => $spj, 'role' => 'Ketua Harian']);
    }
    
    public function approvedRejectedSpj(Request $request, $id){
        $file = Spj::findOrFail($id);
        $data = $request->input('action');
        if($file){
            $file->ketuaharian_approved = $data;
            $file->alasan_ketuaharian = $request->input('alasan_ketuaharian');
            $file->save();
        }

        if($data == 1){
            $msg = 'Berhasil Approve Proposal';
            $file->status = 6;
            $file->save();
        }else if($data == 2){
            $msg = 'Berhasil Reject Proposal';
            $file->status = 4;
            $file->save();
        }

        $filename = $file->id_transaksi.'_'.$file->bidang->name.'_termin_'.$request->input('termin').'_approval ketua spj.'.$request->file('verifikasi_spj')->extension();
        $filename = strtolower($filename);

        $filepath = strtolower('files/'.$file->bidang->name.'/approval ketua spj');
        $type = $request->file('verifikasi_spj')->getClientMimeType();
        $size = $request->file('verifikasi_spj')->getSize();
        $path = $request->file('verifikasi_spj')->move($filepath, $filename);
        $verifikasiCreate = ApprovalKetuaSpj::create([
            'filename' => $filename,
            'type' => $type,
            'size' => $size,
            'folder_path' => $path,
            'spj_id' => $id,
        ]);
        return redirect()->route('ketua-harian.home')->with(['msg_approveReject' => $msg]);
    }
}
