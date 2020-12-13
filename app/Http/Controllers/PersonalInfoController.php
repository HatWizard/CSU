<?php

namespace App\Http\Controllers;

use App\Models\DocumentRequest;
use App\Models\PersonalInfo;

use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    function create($request_id)
    {
        return view('PersonalInfoCreate')->with("request_id", $request_id);;
    }

    function store($request_id)
    {
        $documentRequest=DocumentRequest::findAndValid($request_id);
        if(is_null($documentRequest)) abort(404);

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

        $personalInfoID = $documentRequest->personal_info_ID;

        if($personalInfoID==null)
        {   
            $personalInfo = new PersonalInfo($request);
            $personalInfo->request_id=$documentRequest->id;
            $personalInfo->save();
            $documentRequest->personal_info_ID=$personalInfo->id;
            $documentRequest->update();
        }
        else
        {
            PersonalInfo::find($personalInfoID)->update($request);
        }
    
        
        return redirect()->route('request', [$request_id]);
        
    }

}
