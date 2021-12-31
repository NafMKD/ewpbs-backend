<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAccount extends Model
{
    use HasFactory;

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
