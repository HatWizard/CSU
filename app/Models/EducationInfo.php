<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationInfo extends Model
{
    use HasFactory;

    protected $casts = ['education_document_photos_names' => 'array'];

    protected $fillable=[
        'education_level',
        'education_document_type',
        'education_document_serial',
        'education_document_number',
        'education_date',
        'education_region',
        'education_institution_name',
        'education_language',
        'education_document_photos_names'
    ];


    public function request(){
        $this->belongsTo(DocumentRequest::class);
    }
}
