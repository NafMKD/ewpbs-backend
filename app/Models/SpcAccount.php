<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class SpcAccount extends Authenticatable
{
    use HasFactory, Notifiable;

    // mass fillable columns in database
    protected $fillable =[
        'spc_id', 'spc_username', 'spc_password', 'remember_token', 'spc_last_login', 'spc_last_logout'
    ];

    // hidden columns in object instance
    protected $hidden = [
        'spc_password','remember_token'
    ];

    protected $guarded = [];

    // belongs to one spc
    public function spcInformation(){
        return $this->belongsTo(SpcInformation::class, 'spc_id', 'spc_id');
    }
}
