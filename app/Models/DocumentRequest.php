<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentRequest extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function Personalinfo(){
        $this->hasOne(PersonalInfo::class);
    }
    
    public function ResidenceInfo(){
        $this->hasOne(ResidenceInfo::class);
    }

    public function DocumentValidinfo(){
        $this->hasOne(DocumentValidInfo::class);
    }


    protected $attributes = [
        'personal_info_ID' => null,
        'residence_info_ID' => null,
        'docValid_info_ID' => null
    ];
}
