<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LembarPembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penerima',
        'npwp_penerima',
        'alamat_penerima',
        'rekening_penerima',
        'bank',
        'keterangan',
        'nominal',
        'date_of_transaction',
        'filename',
        'type',
        'size',
        'proposal_id',
        'folder_path'
    ];

    public function proposal(){
        return $this->belongsTo('App\Models\Proposal');
    }
}
