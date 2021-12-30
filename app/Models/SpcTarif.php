<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpcTarif extends Model
{
    use HasFactory;

    // specifing custom primary key for the model
    protected $primaryKey = 'spc_tarif_id';
    // mass fillable columns in the database
    protected $fillable = [
     'spc_id', 'spc_tarif_meter_min', 'spc_tarif_meter_max', 'spc_tarif_amount'
    ];

    protected $guarded = [];

    // a tarif belongs to one spc
    public function spcInformation()
    {
        return $this->belongsTo(SpcInformation::class, 'spc_id', 'spc_id');
    }
}
