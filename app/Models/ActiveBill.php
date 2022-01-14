<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveBill extends Model
{
    use HasFactory;

    // mass fill
    protected $fillable = [
        'sp_id', 'customer_id', 'ac_meter_reading', 'ac_meter_reading_previous','ac_meter_reading_tarif','ac_amount_birr', 'ac_month_year', 'ac_reading_date'
    ];

    // specifing custom primary key
    protected $primaryKey = 'ac_bill_id';
    protected $guarded =[];

    // hase one sp 
    public function spInfromation()
    {
        return $this->belongsTo(SpInformation::class, 'sp_id', 'sp_id');
    }

    // hase one customer
    public function customerInfromation()
    {
        return $this->belongsTo(CustomerInformation::class, 'customer_id', 'customer_id');
    }

}
