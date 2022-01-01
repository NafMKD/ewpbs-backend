<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminInformation extends Model
{
    use HasFactory;

    protected $primaryKey = "admin_id";

    // mass filling of admin information data
    protected $fillable = [
        'admin_first_name',
        'admin_last_name',
        'admin_phone',
    ];

     // Admin has one account 
     public function adminAccount()
     {
         return $this->hasOne(AdminAccount::class, 'admin_id', 'admin_id');
     }
 
     // Admin may have multiple eventlogs
     public function adminEventLog()
     {
         return $this->hasMany(AdminEventLog::class, 'admin_id', 'admin_id');
     }

}
