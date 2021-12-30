<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpcInformation extends Model
{
    use HasFactory;

    // spacifing custom primary key to the model
    protected $primaryKey = "spc_id";

    // mass fillable columns in database
    protected $fillable = [
        'spc_name'
    ];

    protected $guarded = [];

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
