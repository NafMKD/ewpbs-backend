<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerEventLog extends Model
{
    use HasFactory;
    
    protected $guarded =[];

    // mass filling customer eventlog
    protected $fillable = [
     'customer_id', 'customer_event_action', 'customer_event_detail'
    ];
    // Eventlog belongs to one customer
    public function customerInformation()
    {
        return $this->belongsTo(CustomerInformation::class, 'customer_id', 'customer_id');
    }
}
