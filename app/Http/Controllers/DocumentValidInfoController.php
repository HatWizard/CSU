<?php

namespace App\Http\Controllers;

use App\Models\DocumentValidInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

include(app_path()."\Library\FilesHandler.php");

class DocumentValidInfoController extends Controller
{

    

    function create()
    {
        return view('DocumentValidInfo_Create');
    }

    function store()
    {

 

        
        $request = request()->validate([
            'validDoc_document_type'=>'required',
            'validDoc_serial'=>'required',
            'validDoc_date'=>'required',
            'validDoc_number'=>'required',
            'validDoc_subdivision_code'=>'required',
            'validDoc_photos'=>'required',
            'validDoc_photos.*'=>'mimes:jpeg,jpg,png|max:2048'
        ]);
        
        $documentRequest = auth()->user()->DocumentRequest;
        $docValID = $documentRequest->docValid_info_ID;
        $path = "private/UsersData/".auth()->user()->id."/".auth()->user()->DocumentRequest->id."/"."validation_docPhoto"."/";


        if($docValID==null)
        {   
            $docValidInfo = $this->fillObject($request);
            $fileNames = WriteFiles($request['validDoc_photos'], $path);         
            $docValidInfo['validDoc_photosPath']=$fileNames;
            $docValidInfoObject = new DocumentValidInfo($docValidInfo);
            $docValidInfoObject->save();
            $documentRequest->docValid_info_ID=$docValidInfoObject->id;
            $documentRequest->update();
        }
        else
        {
            $docValidInfoObject=DocumentValidInfo::find($docValID);
            DeleteFiles($docValidInfoObject->validDoc_photosPath, $path);
            $docValidInfo = $this->fillObject($request);
            $docValidInfo['validDoc_photosPath'] = WriteFiles($request['validDoc_photos'], $path);
            $docValidInfoObject->update($docValidInfo);
        }
        
        return redirect('home/request/create');
    }

   
    function fillObject($request){
        $docValidInfo = Array();
        $docValidInfo['validDoc_document_type']=$request['validDoc_document_type'];
        $docValidInfo['validDoc_serial']=$request['validDoc_serial'];
        $docValidInfo['validDoc_date']=$request['validDoc_date'];
        $docValidInfo['validDoc_number']=$request['validDoc_number'];
        $docValidInfo['validDoc_subdivision_code']=$request['validDoc_subdivision_code'];
        return $docValidInfo;
    }
}
