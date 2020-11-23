<?php

namespace App\Http\Controllers;

use App\Models\ResidenceInfo;
use Illuminate\Http\Request;

class ResidenceInfoController extends Controller
{
    function create()
    {
        return view('ResidenceInfo_Create');
    }

    function store()
    {
        
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
        $documentRequest = auth()->user()->DocumentRequest;
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
    
        
        return redirect('home/request/create');
    }
}
