<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpcAccount extends Model
{
    use HasFactory;

    protected $hidden = [
        'spc_password',
        'remember_token',
    ];


    // belonds to one spc
    public function spcInformation(){
        return $this->belongsTo(SpcInformation::class, 'spc_id', 'spc_id');
    }
}
