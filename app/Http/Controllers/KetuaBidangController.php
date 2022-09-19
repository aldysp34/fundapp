<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Spj;
use App\Models\SpjFile;
use App\Models\SpjExcel;
use App\Models\ProposalFile;

class KetuaBidangController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function upload_proposal(Request $request){
        $data = Proposal::all();
        $data = count($data);

        $variable = 'proposal_'.strtolower(auth()->user()->bidang->name).'_00'.$data++;
        $createProposal = Proposal::create([
            'id_transaksi' => $variable,
            'deskripsi' => $request->input('deskripsi'),
            'bidang_id' => auth()->user()->bidang->id,
            'status' => 1,
            'verifikator_approved' => 0,
            'alasan_verifikator' => '',
            'ketuaharian_approved' => 0,
            'alasan_ketuaharian' => '',
            'termin' => $request->input('termin'),
            'jumlah_diajukan' => $request->input('jumlah_diajukan')
        ]);

        $filename = $variable.'_'.auth()->user()->bidang->name.'_termin_'.$request->input('termin').'_proposal.'.$request->file('proposal_file')->extension();
        $filename = strtolower($filename);

        $filepath = strtolower('files/'.$request->input('bidang').'/proposal');
        $type = $request->file('proposal_file')->getClientMimeType();
        $size = $request->file('proposal_file')->getSize();
        $path = $request->file('proposal_file')->move($filepath, $filename);

        $createFile = ProposalFile::create([
            'filename' => $filename,
            'type' => $type,
            'size' => $size,
            'folder_path' => $path,
            'proposal_id' => $createProposal->id,
        ]);


        return redirect()->back()->with(['msg' => 'Berhasil Menambahkan Data']);


    }
    public function upload_spj(Request $request){
        $data = Spj::all();
        $data = count($data);

        $variable = 'spj_'.strtolower(auth()->user()->bidang->name).'_00'.$data++;

        $spjFile = $variable.'_'.auth()->user()->bidang->name.'_termin_'.$request->input('termin').'_spj.'.$request->file('spj_file')->extension();
        $spjFile = strtolower($spjFile);

        $spjFilepath = strtolower('files/'.auth()->user()->bidang->name.'/spj');
        $typeFile = $request->file('spj_file')->getClientMimeType();
        $sizeFile = $request->file('spj_file')->getSize();
        $pathFile = $request->file('spj_file')->move($spjFilepath, $spjFile);

        $createSpj = Spj::create([
            'id_transaksi' => $variable,
            'nominal_spj' => $request->input('nominal_spj'),
            'bidang_id' => auth()->user()->bidang->id,
            'deskripsi' => $request->input('deskripsi'),
            'status' => 1,
            'nominal_verifikasi' => 0,
            'verifikator_approved' => 0,
            'alasan_verifikator' => '',
            'ketuaharian_approved' => 0,
            'alasan_ketuaharian' => '',
            'termin' => $request->input('termin')
        ]);

        $spjFileExcel = $variable.'_'.auth()->user()->bidang->name.'_termin_'.$request->input('termin').'_spjExcel.'.$request->file('spj_excel')->extension();
        $spjFileExcel = strtolower($spjFileExcel);

        $filepathExcel = strtolower('files/'.auth()->user()->bidang->name.'/spj');
        $typeFileExcel = $request->file('spj_excel')->getClientMimeType();
        $sizeFileExcel = $request->file('spj_excel')->getSize();
        $pathFileExcel = $request->file('spj_excel')->move($filepathExcel, $spjFileExcel);

        


        try{
            $createFile = SpjFile::create([
                'filename' => $spjFile,
                'type' => $typeFile,
                'size' => $sizeFile,
                'folder_path' => $pathFile,
                'spj_id' => $createSpj->id,
            ]);
        }catch(\Exception $e){
            dd($e);
        }

        try{

            $createExcel = SpjExcel::create([
                'filename' => $spjFileExcel,
                'type' => $typeFileExcel,
                'size' => $sizeFileExcel,
                'folder_path' => $pathFileExcel,
                'spj_id' => $createSpj->id,
            ]);
        }catch(\Exception $e){
            dd($e);
        }

        return redirect()->back()->with(['msg' => 'Berhasil Menambahkan Data']);

    }
    public function new_proposal(){
        $data = Proposal::all();
        $data = count($data);

        $variable = 'proposal_'.strtolower(auth()->user()->bidang->name).'_00'.$data++;
        // dd($variable);
        return view('ketuabidang.new_proposal', ['role' => 'Ketua Bidang', 'variable' => $variable]);
    }
    public function new_spj(){
        $data = Spj::all();
        $data = count($data);
        
        $variable = 'spj_'.strtolower(auth()->user()->bidang->name).'_00'.$data++;
        return view('ketuabidang.new_spj', ['role' => 'Ketua Bidang', 'variable' => $variable]);
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
        $spj->spj_file;

        return view('ketuabidang.detail_spj', ['spj' => $spj, 'role' => 'Ketua Bidang']);
    }

    

}
