<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInformation extends Model
{
    use HasFactory;

    protected $primaryKey = "customer_id";

    protected $fillable = [
        'customer_first_name',	
        'customer_middle_name',	
        'customer_last_name',	
        'customer_phone',	
        'customer_region',	
        'customer_town',	
        'customer_kebele',	
        'customer_house_no'
    ];

    // customer has one account 
    public function customerAccount()
    {
        return $this->hasOne(CustomerAcount::class, 'customer_id', 'customer_id');
    }

    // customer may have multiple eventlogs
    public function customerEventLog()
    {
        return $this->hasMany(CustomerEventeLog::class, 'customer_id', 'customer_id');
    }
}
