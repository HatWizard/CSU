<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentValidInfo extends Model
{
    use HasFactory;

    public function request(){
        $this->belongsTo(DocumentRequest::class);
    }
}
