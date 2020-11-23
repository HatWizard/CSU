<?php

namespace App\Http\Controllers;

use App\Models\DocumentRequest;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    function create()
    {
        return view('PersonalInfoCreate');
    }

    function store()
    {
        $request = request()->validate([
            'name'=>'required',
            'surname'=>'required',
            'phone_number'=>'required',
            'response_email'=>'required',
            'birthdate'=>'required',
            'future_education_level'=>'required',
            'univercity_subdivision'=>'required',
            'birthplace'=>'required',
            'gender'=>'required',
        ]); 
        $documentRequest = $personalInfoID = auth()->user()->DocumentRequest;
        $personalInfoID = $documentRequest->personal_info_ID;
        
        $personalInfo = new PersonalInfo($request);
        $personalInfo->request_id=$documentRequest->id;

        if($personalInfoID==null)
        {      
            $personalInfo->save();
            $documentRequest->personal_info_ID=$personalInfo->id;
            $documentRequest->update();
        }
        else
        {
            PersonalInfo::find($personalInfoID)->update($request);
        }
    
        
        return redirect('home/request/create');
        
    }

}
