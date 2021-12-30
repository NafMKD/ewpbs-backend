<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SpcInformation;

class SpcEventLog extends Model
{
    use HasFactory;

    // belonds to one spc
    public function spcInformation(){
        return $this->belongsTo(SpcInformation::class, 'spc_id', 'spc_id');
    }
}
