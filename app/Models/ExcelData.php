<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcelData extends Model
{
    use HasFactory;

    protected $fillable = [
        'uraian',
        'volume_1',
        'satuan_1',
        'volume_2',
        'satuan_2',
        'volume_3',
        'satuan_3',
        'harga_satuan',
        'jumlah'
    ];
}
