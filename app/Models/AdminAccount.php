<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAccount extends Model
{
    use HasFactory;
    // mass fillin of data into account
    protected $fillable = [
        'admin_id', 'admin_username', 'admin_password', 'remember_token', 'admin_last_login', 'admin_last_logout'
    ];
    protected $guarded = [];
    // hiding sencsetive data
    protected $hidden = [
       'admin_password',
       'remember_token',
    ];
    // acount belongs to one admin
    public function adminInformation()
    {
        return $this->belongsTo(AdminInformation::class, 'admin_id', 'admin_id');
    }
}
