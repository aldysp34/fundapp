<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LembarVerifikasiSpj;

class LembarVerifikasiSpjController extends Controller
{
    public function download($id){
        $proposalFile = LembarVerifikasiSpj::where('proposal_id', $id)->first();
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
