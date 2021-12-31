<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpEmployeeEventLog extends Model
{
    use HasFactory;
    // mass fillable columns in database
    protected $fillable =[
     'sp_emp_id', 'sp_emp_event_action', 'sp_emp_event_detail'
    ];

    protected $guarded = [];
    // an event log belongs to one sp employee
    public function spEmployeeInformation()
    {
        return $this->belongsTo(SpEmployeeInformation::class, 'sp_emp_id', 'sp_emp_id');
    }
}
