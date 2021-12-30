<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpcAccount extends Model
{
    use HasFactory;

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
