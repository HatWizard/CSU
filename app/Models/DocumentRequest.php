<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Block\Element\Document;

class DocumentRequest extends Model
{
    use HasFactory;

    public const STATES = [
        1 => 'Заполняется',
        2 => 'Проверяется',
        3 => 'Одобрено',
        4 => 'Ошибка'
     ];

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

    public function EducationInfo(){
        $this->hasOne(EducationInfo::class);
    }

    protected $attributes = [
        'personal_info_ID' => null,
        'residence_info_ID' => null,
        'docValid_info_ID' => null,
        'education_info_ID' => null,
        'deleted'=>false,
        'record_state'=>1
    ];

    public static function findAndValid($request_id){
        $documentRequest=DocumentRequest::find($request_id);
        if(is_null($documentRequest)) return null;
        if(!auth()->user()->DocumentRequests->contains($documentRequest))  return null;
        return $documentRequest;
    }

    public function get_progress(){
        $amount = 0;
        if($this->personal_info_ID!=null) $amount+=0.25;
        if($this->residence_info_ID!=null) $amount+=0.25;
        if($this->docValid_info_ID!=null) $amount+=0.25;
        if($this->education_info_ID!=null) $amount+=0.25;
        return $amount;
    }

    public function is_completed(){
        return $this->get_progress()==1;
    }


    public function getStateAttribute()
    {
       return self::STATES[ $this->record_state ];
    }
    /**
    * set user role
    */
    public function setStateAttribute($value)
    {
       $stateID = self::getRoleID($value);
       if ($stateID) {
          $this->record_state = $stateID;
       }
    }


}
