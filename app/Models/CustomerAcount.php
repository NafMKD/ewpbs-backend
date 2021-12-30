<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAcount extends Model
{
    use HasFactory;

    protected $hidden = [
        'customer_password',
        'remember_token',
    ];

    // account belongs to one customer
    public function customerInformation()
    {
        return $this->belongsTo(CustomerInformation::class, 'customer_id', 'customer_id');
    }
}
