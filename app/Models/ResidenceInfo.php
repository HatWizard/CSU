<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenceInfo extends Model
{
    use HasFactory;

    public function request(){
        $this->belongsTo(DocumentRequest::class);
    }
}
