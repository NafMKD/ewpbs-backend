<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdminAccount extends Authenticatable
{
    use HasFactory, Notifiable;
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
