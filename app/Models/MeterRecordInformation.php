<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeterRecordInformation extends Model
{
    use HasFactory;

    // mass filling
    protected $fillable = [
      'sp_emp_id', 'meter_id', 'meter_reading', 'status', 'meter_reading_month_year', 'meter_reading_date'
    ];

    // specifing custom primary key
    protected $primaryKey = 'meter_record_id';

    protected $guarded = [];

    // every read belongs to one employee
    public function employeeRead()
    {
        return $this->belongsTo(SpEmployeeInformation::class, 'sp_emp_id', 'sp_emp_id');
    }
    
    // every read belongs to one meter
    public function meterRead()
    {
        return $this->belongsTo(MeterInformation::class, 'meter_id', 'meter_id');
    }
}
