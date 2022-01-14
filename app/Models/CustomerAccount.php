<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CustomerAccount extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
     'customer_id', 'customer_username', 'customer_password', 'remember_token', 'customer_last_login', 'customer_last_logout'
    ];
    protected $guarded = [];
    // hiding sencsetive data
    protected $hidden = [
        'customer_password',
        'remember_token',
    ];

    // account belongs to one customer
    public function customerInformation()
    {
        return $this->belongsTo(CustomerInformation::class, 'customer_id', 'customer_id');
    }
}
