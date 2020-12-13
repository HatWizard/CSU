<?php

namespace App\Http\Controllers;

use App\Models\ResidenceInfo;
use App\Models\DocumentRequest;
use Illuminate\Http\Request;

class ResidenceInfoController extends Controller
{
    function create($request_id)
    {
        return view('ResidenceInfo_Create')->with("request_id", $request_id);;
    }

    function store($request_id)
    {
        $documentRequest=DocumentRequest::findAndValid($request_id);
        if(is_null($documentRequest)) abort(404);
        
        $request = request()->validate([
            'residence_index'=>'required',
            'residence_region'=>'required',
            'residence_district'=>'required',
            'residence_district'=>'required',
            'residence_city'=>'required',
            'residence_street'=>'required',
            'residence_homeNumber'=>'required',
            'residence_apartmentNumber'=>'required',
            'citizenship'=>'required',
        ]); 
        $residenceInfoID = $documentRequest->residence_info_ID;
        
        if($residenceInfoID==null)
        {   
            $residenceInfo = new ResidenceInfo($request);
            $residenceInfo->request_id=$documentRequest->id;
            $residenceInfo->save();
            $documentRequest->residence_info_ID=$residenceInfo->id;
            $documentRequest->update();
        }
        else
        {
            ResidenceInfo::find($residenceInfoID)->update($request);
        }
    
        
        return redirect()->route('request', [$request_id]);
    }
}
