<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalKetua extends Model
{
    use HasFactory;
    protected $fillable = [
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
