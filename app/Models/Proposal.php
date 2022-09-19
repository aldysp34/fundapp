<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_transaksi',
        'bidang_id',
        'deskripsi',
        'jumlah_diajukan',
        'jumlah_approval',
        'status',
        'verifikator_approved',
        'alasan_verifikator',
        'ketuaharian_approved',
        'alasan_ketuaharian',
        'termin'
    ];

    public function bidang(){
        return $this->belongsTo('App\Models\Bidang');
    }
    
    public function proposal_file(){
        return $this->hasOne('App\Models\ProposalFIle');
    }

    public function lembarVerifikasi(){
        return $this->hasOne('App\Models\LembarVerifikasi');
    }

    public function lembarPembayaran(){
        return $this->hasOne('App\Models\LembarPembayaran');
    }

    public function suratBayar(){
        return $this->hasOne('App\Models\SuratBayar');
    }

    public function approvalKetua(){
        return $this->hasOne('App\Models\ApprovalKetua');
    }
}
