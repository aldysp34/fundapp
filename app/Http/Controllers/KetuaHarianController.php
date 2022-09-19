<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\ApprovalKetua;

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
        return redirect()->back()->with(['msg_approveReject' => $msg]);
    }
}
