<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenceInfo extends Model
{
    use HasFactory;

    protected $fillable=
    [
     'residence_index',
     'residence_region',
     'residence_district',
     'residence_city',
     'residence_street',
     'residence_homeNumber',
     'residence_apartmentNumber',
     'citizenship'
    ];

    public function request(){
        $this->belongsTo(DocumentRequest::class);
    }
}
