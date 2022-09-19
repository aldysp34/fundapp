<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spj extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_transaksi',
        'bidang_id',
        'deskripsi',
        'nominal_spj',
        'nominal_verifikasi',
        'status',
        'verifikator_approved',
        'alasan_verifikator',
        'ketuaharian_approved',
        'alasan_ketuaharian',
        'termin'
    ];

    public function spj_file(){
        return $this->hasOne('App\Models\SpjFile');
    }

    public function spj_excel(){
        return $this->hasOne('App\Models\SpjExcel');
    }

    public function lembarVerifikasi(){
        return $this->hasOne('App\Models\LembarVerifikasiSpj');
    }

    public function bidang(){
        return $this->belongsTo('App\Models\Bidang');
    }
}
