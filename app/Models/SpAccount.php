<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpAccount extends Model
{
    use HasFactory;

    // fillable columns
    protected $fillable = [
     'sp_id', 'sp_username', 'sp_password', 'remember_token', 'sp_last_login', 'sp_last_logout'
    ];

    // hiden columns from instace
    protected $hidden = [
        'sp_password',
        'remember_token'
    ];

    protected $guarded = [];

    // an account belongs to one service provider
    public function spInformation()
    {
        return $this->belongsTo(SpInformation::class, 'sp_id', 'sp_id');
    }
}
