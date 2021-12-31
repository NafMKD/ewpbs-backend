<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpEmployeeAccount extends Model
{
    use HasFactory;
    // fillable columns
    protected $fillable = [
     'sp_emp_id', 'sp_emp_username', 'sp_emp_password', 'remember_token', 'sp_emp_last_login', 'sp_emp_last_logout'
    ];

    // hiden columns from instace
    protected $hidden = [
        'sp_emp_password',
        'remember_token'
    ];

    protected $guarded = [];

    // an account belongs to one service provider
    public function spEmployeeInformation()
    {
        return $this->belongsTo(SpEmployeeInformation::class, 'sp_emp_id', 'sp_emp_id');
    }
}
