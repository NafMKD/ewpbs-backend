<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerEventeLog extends Model
{
    use HasFactory;

     // Eventlog belongs to one customer
    public function CustomerInformation()
    {
        return $this->belongsTo(CustomerInformation::class, 'customer_id', 'customer_id');
    }
}
