<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpcInformation extends Model
{
    use HasFactory;

    protected $primaryKey = "spc_id";

    protected $fillable = [
        'spc_name'
    ];

    // have one account
    public function spcAccount()
    {
        return $this->hasOne(SpcAccount::class, 'spc_id', 'spc_id');
    }

    // have many event logs
    public function spcEventLog()
    {
        return $this->hasMany(SpcEventLog::class, 'spc_id', 'spc_id');
    }
}
