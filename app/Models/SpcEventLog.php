<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SpcInformation;

class SpcEventLog extends Model
{
    use HasFactory;

    // mass fillable columns in database
    protected $fillable =[
        'spc_id', 'spc_event_action', 'spc_event_detail'	
    ];

    protected $guarded = [];
    
    // belonds to one spc
    public function spcInformation(){
        return $this->belongsTo(SpcInformation::class, 'spc_id', 'spc_id');
    }
}
