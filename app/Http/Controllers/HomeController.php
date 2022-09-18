<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Spj;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bidangId = auth()->user()->id;
        $proposal = Proposal::where('bidang_id', $bidangId)->get();

        $spj = Spj::where('bidang_id', $bidangId)->get();
        return view('ketuabidang.index', ['role' => 'Ketua Bidang', 'proposal' => $proposal, 'spj' => $spj]);
    }

    public function verifikatorHome(){
        $proposal = Proposal::all();
        $spj = Proposal::all();

        $proposal_need_approved = array();
        $spj_need_approved = array();

        foreach($proposal as $x){
            if($x->verifikator_approved == 0){
                $x->proposal_file;
                array_push($proposal_need_approved, $x);
            }
        }

        foreach($spj as $x){
            if($x->verifikator_approved == 0){
                $x->spj_file;
                array_push($spj_need_approved, $x);
            }
        }

        return view('verifikator.index', ['role' => 'Verifikator', 'proposal' => $proposal_need_approved, 'spj' => $spj]);
    }

    public function bendaharaHome(){
        // Function untuk proposal yang belum memiliki surat bayar
        $proposal = Proposal::all();

        $proposal_need_suratbayar = array();
        foreach($proposal as $x){
            if($x->verifikator_approved == 1 && $x->ketuaharian_approved == 0){
                if(!$x->suratBayar){
                    $x->proposal_file;
                    $x->lembarVerifikasi;
                    array_push($proposal_need_suratbayar, $x);
                }
            }
        }

        return view('bendahara.index', ['role' => 'Bendahara', 'proposal' => $proposal_need_suratbayar]);
    }

    public function ketuaharianHome(){
        $proposal = Proposal::all();

        $proposal_need_approved = array();
        foreach($proposal as $x){
            if($x->verifikator_approved == 1 && $x->ketuaharian_approved == 0){
                if($x->suratBayar){
                    $x->proposal_file;
                    $x->lembarVerifikasi;
                    array_push($proposal_need_approved, $x);
                }
            }
        }

        return view('ketuaharian.index', ['role' => 'Ketua Harian', 'proposal' => $proposal_need_approved]);
    }

    public function adminHome(){
        return 'ini admin';
    }
}
