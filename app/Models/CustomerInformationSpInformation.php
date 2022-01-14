<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInformationSpInformation extends Model
{
    use HasFactory;
    protected $primaryKey = "cisi_id";

    // specifing fillable columns in database
    protected $fillable = [
        'customer_id','sp_id', 'status'
    ];
}
