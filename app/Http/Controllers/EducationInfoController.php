<?php

namespace App\Http\Controllers;

use App\Models\EducationInfo;
use App\Models\DocumentRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\DocumentRequestController;

include_once(app_path()."\Library\FilesHandler.php");

class EducationInfoController extends Controller
{
    function create($request_id)
    {
        return view('EducationInfo_Create')->with("request_id", $request_id);;
    }

    function store($request_id)
    {
        $documentRequest=DocumentRequest::findAndValid($request_id);
        if(is_null($documentRequest)) abort(404);

        $request = request()->validate([
            'education_level'=>'required',
            'education_document_type'=>'required',
            'education_document_serial'=>'required',
            'education_document_number'=>'required',
            'education_date'=>'required',
            'education_region'=>'required',
            'education_institution_name'=>'required',
            'education_language'=>'required',
            'educationDoc_photo'=>'required',
            'educationDoc_photo.*'=>'mimes:jpeg,jpg,png|max:2048'
        ]);

        $educationInfoID = $documentRequest->education_info_ID;
        $path = "private/UsersData/".auth()->user()->id."/".$request_id."/"."education_docPhotos"."/";
        
        if($educationInfoID==null)
        {   
            $educationInfo = $this->fillObject($request);
            $fileNames = WriteFiles($request['educationDoc_photo'], $path);         
            $educationInfo['education_document_photos_names']=$fileNames;    
            $educationInfoObject = new EducationInfo($educationInfo);
            $educationInfoObject->request_id=$documentRequest->id;
            $educationInfoObject->save();
            $documentRequest->education_info_ID=$educationInfoObject->id;
            $documentRequest->update();
        }
        else
        {
            $educationInfo_Object=EducationInfo::find($educationInfoID);
            DeleteFiles($educationInfo_Object->validDoc_photosPath, $path);
            $educationInfo = $this->fillObject($request);
            $educationInfo['education_document_photos_names'] = WriteFiles($request['educationDoc_photo'], $path);
            $educationInfo_Object->update($educationInfo);
        }
        
        return redirect()->route('request', [$request_id]);
        
    }

       
    function fillObject($request){
        $docValidInfo = Array();
        $docValidInfo['education_level']=$request['education_level'];
        $docValidInfo['education_document_type']=$request['education_document_type'];
        $docValidInfo['education_document_serial']=$request['education_document_serial'];
        $docValidInfo['education_document_number']=$request['education_document_number'];
        $docValidInfo['education_date']=$request['education_date'];

        $docValidInfo['education_region']=$request['education_region'];
        $docValidInfo['education_institution_name']=$request['education_institution_name'];
        $docValidInfo['education_language']=$request['education_language'];
        return $docValidInfo;
    }
}

