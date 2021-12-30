<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpInformation extends Model
{
    use HasFactory;

    protected $primaryKey = "sp_id";

    protected $fillable = [
        'spc_id',	
        'sp_name',	
        'sp_region',	
        'sp_zone',	
        'sp_town'	
    ];

    // service provider have one account
    public function spAccount()
    {
        return $this->hasOne(SpAccount::class, 'sp_id', 'sp_id');
    }

    // service provider mave many event logs
    public function spEventLog()
    {
        return $this->hasMany(SpEventLog::class, 'sp_id', 'sp_id');
    }
}
