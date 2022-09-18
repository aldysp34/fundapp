<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LembarVerifikasiSpj extends Model
{
    use HasFactory;

    public function spj(){
        return $this->belongsTo('App\Models\Spj');
    }
}
