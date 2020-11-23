<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentValidInfo extends Model
{
    use HasFactory;

    protected $casts = ['validDoc_photosPath' => 'array'];

    protected $fillable = 
    [
        'validDoc_document_type', 
        "validDoc_serial",
        "validDoc_date",
        "validDoc_number",
        "validDoc_subdivision_code",
        'validDoc_photosPath'
    ];



    public function request(){
        $this->belongsTo(DocumentRequest::class);
    }
}
