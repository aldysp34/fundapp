<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LembarVerifikasiSpj extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'type',
        'size',
        'spj_id',
        'folder_path'
    ];

    public function spj(){
        return $this->belongsTo('App\Models\Spj');
    }
}
