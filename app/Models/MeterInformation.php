<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeterInformation extends Model
{
    use HasFactory;

    // specifing custom primary key
    protected $primaryKey = 'meter_id';
    // mass fillable
    protected $fillable = [
      'customer_id', 'sp_id', 'meter_serial', 'meter_latitude', 'meter_longitude'
    ];

    protected $guarded = [];

    // meter has one service provider
    public function spInformation()
    {
        return $this->belongsTo(SpInformation::class, 'sp_id', 'sp_id');
    }

    // meter has one customer
    public function customerInformation()
    {
        return $this->belongsTo(CustomerInformation::class, 'customer_id', 'customer_id');
    }
}
