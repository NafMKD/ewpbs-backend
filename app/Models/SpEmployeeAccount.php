<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class SpEmployeeAccount extends Authenticatable
{
    use HasFactory, Notifiable;
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
