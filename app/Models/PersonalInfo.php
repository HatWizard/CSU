<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;

    protected $fillable = ['name','surname', 'phone_number', 'response_email', 'birthdate', 'future_education_level', 
    'univercity_subdivision', 'birthplace', 'gender'];

    public function request(){
        return $this->belongsTo(DocumentRequest::class);
    }


}
