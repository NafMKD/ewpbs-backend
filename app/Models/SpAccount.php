<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpAccount extends Model
{
    use HasFactory;

    protected $hidden = [
        'sp_password',
        'remember_token'
    ];

    // an account belongs to one service provider
    public function spInformation()
    {
        return $this->belongsTo(SpInformation::class, 'sp_id', 'sp_id');
    }
}
