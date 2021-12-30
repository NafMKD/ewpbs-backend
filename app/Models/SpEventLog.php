<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpEventLog extends Model
{
    use HasFactory;

    // an event log belongs to one service provider
    public function spInformation()
    {
        return $this->belongsTo(SpInformation::class, 'sp_id', 'sp_id');
    }
}
