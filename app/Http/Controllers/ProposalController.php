<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProposalRequest;
use App\Models\Proposal;
use App\Models\ProposalFile;

class ProposalController extends Controller
{
    public function store(StoreProposalRequest $request){
        /* 
            Request Proposal Input
            ID Transaksi
            Tanggal
            Bidang
            Deskripsi
            Jumlah Pengajuan
            File berkas pengajuan
            Termin (Tidak bisa dilihat di form)
        */
        $filename = $request->id_transaksi.'_'.$request->bidang.'_termin '.$request->input('termin').'_'.$request->termin.'_proposal.'.$request->file->extension();
        $filename = strtolower($filename);

        $filepath = strtolower('files/'.$request->bidang.'/proposal');
        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();
        $path = $request->file->move($filepath, $filename);

        $proposalCreate = Proposal::create([
            'id_transaksi' => $request->id_transaksi,
            'bidang' => $request->bidang,
            'deskripsi' => $request->deskripsi,
            'jumlah_diajukan' => $request->jumlah_pengajuan,
            'termin' => $request->termin
        ]);

        $fileCreate = ProposalFile::create([
            'filename' => $filename,
            'type' => $type,
            'size' => $size,
            'folder_path' => $path,
            'proposal_id' => $proposalCreate->id,
        ]);

        if($proposalCreate && $fileCreate){
            return json_encode([
                'upload_status' => 1,
                'message' => 'Berhasil Mengajukan!!'
            ]);
        }else{
            return json_encode([
                'upload_status' => 0,
                'message' => 'Oops Terjadi Kesalahan'
            ]);
        }
        
    }

    public function download($id){
        $proposalFile = ProposalFile::where('proposal_id', $id)->first();
        $filepath = public_path().'/'.$proposalFile->folder_path;

        if(file_exists($filepath)){
            return \Response::download($filepath);
        }else{
            return json_encode([
                'download_status' => 0,
                'message' => 'Oops File tidak ditemukan'
            ]);
        }
    }
}
