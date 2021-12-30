<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpEventLog extends Model
{
    use HasFactory;
    // mass fillable columns in database
    protected $fillable =[
        'sp_id', 'sp_event_action', 'sp_event_detail'	
    ];

    protected $guarded = [];
    // an event log belongs to one service provider
    public function spInformation()
    {
        return $this->belongsTo(SpInformation::class, 'sp_id', 'sp_id');
    }
}
