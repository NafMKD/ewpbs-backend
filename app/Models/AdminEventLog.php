<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminEventLog extends Model
{
    use HasFactory;
    
    protected $guarded=[];
     // mass filling of eventlog
    protected $fillable = [
        'admin_id',	'admin_event_action',	'admin_event_detail'
    ];

    // event belongs to one admin
    public function adminInformation()
    {
        return $this->belongsTo(AdminInformation::class, 'admin_id', 'admin_id');
    }
    	
}
