<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpEmployeeInformation extends Model
{
    use HasFactory;

    // specifing custome primary key 
    protected $primaryKey = "sp_emp_id";

    // specifing fillable columns in database
    protected $fillable = [
     'sp_id', 'sp_emp_first_name', 'sp_emp_middle_name', 'sp_emp_last_name', 'sp_emp_region', 'sp_emp_town', 'sp_emp_phone', 'sp_emp_house_no'	
    ];

    // sp employee have one account
    public function spEmployeeAccount()
    {
        return $this->hasOne(SpEmployeeAccount::class, 'sp_emp_id', 'sp_emp_id');
    }

    // sp employee have many event logs
    public function spEmployeeEventLog()
    {
        return $this->hasMany(SpEmployeeEventLog::class, 'sp_emp_id', 'sp_emp_id');
    }
}
