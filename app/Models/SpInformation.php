<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpInformation extends Model
{
    use HasFactory;

    // specifing custome primary key 
    protected $primaryKey = "sp_id";

    // specifing fillable columns in database
    protected $fillable = [
        'spc_id',	
        'sp_name',	
        'sp_region',	
        'sp_zone',	
        'sp_town'	
    ];

    protected $guarded = [];

    // service provider have one account
    public function spAccount()
    {
        return $this->hasOne(SpAccount::class, 'sp_id', 'sp_id');
    }

    // service provider mave many event logs
    public function spEventLog()
    {
        return $this->hasMany(SpEventLog::class, 'sp_id', 'sp_id');
    }

    // service provider mave many meter
    public function meterInformation()
    {
        return $this->hasMany(MeterInformation::class, 'sp_id', 'sp_id');
    }

    // service provider mave many active bill
    public function activeBill()
    {
        return $this->hasMany(ActiveBill::class, 'sp_id', 'sp_id');
    }

    // service provider may have many customer
    public function customerInformation()
    {
        return $this->belongsToMany(CustomerInformation::class, 'customer_information_sp_information', 'sp_id','customer_id');
    }
}
