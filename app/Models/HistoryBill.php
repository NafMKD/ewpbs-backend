<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryBill extends Model
{
    use HasFactory;
 
    // mass fill
    protected $fillable = [
        'sp_id',  'customer_id','hs_meter_reading', 'hs_meter_reading_previous','hs_meter_reading_tarif', 'hs_amount_birr', 'hs_month_year',  'hs_paid_amount', 'hs_paid_date',   'hs_reading_date'

    ];

    // specifing custom primary key
    protected $primaryKey = 'hs_bill_id';
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
