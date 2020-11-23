<?php

namespace App\Http\Controllers;

use App\Models\DocumentValidInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

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
            'validDoc_photos'=>'required'
        ]);
        
        $documentRequest = auth()->user()->DocumentRequest;
        $docValID = $documentRequest->docValid_info_ID;
        
        if($docValID==null)
        {   
            $docValidInfo = $this->fillObject($request);
            $fileNames = $this->writeFiles($request['validDoc_photos']);         
            $docValidInfo['validDoc_photosPath']=$fileNames;
            $docValidInfoObject = new DocumentValidInfo($docValidInfo);
            $docValidInfoObject->save();
            $documentRequest->docValid_info_ID=$docValidInfoObject->id;
            $documentRequest->update();
        }
        else
        {
            $docValidInfoObject=DocumentValidInfo::find($docValID);
            $this->clearFiles($docValidInfoObject->validDoc_photosPath);
            $docValidInfo = $this->fillObject($request);
            $docValidInfo['validDoc_photosPath'] = $this->writeFiles($request['validDoc_photos']);
            $docValidInfoObject->update($docValidInfo);
        }
        
        return redirect('home/request/create');
    }

    function clearFiles($fileNames){
        foreach($fileNames as $fileName){
            $path = "private/docsPhoto/".auth()->user()->id."/";
            Storage::delete($path.$fileName);
        }
    }

    function writeFiles($files){
        $fileNames=Array();
        foreach($files as $file){
            $filename = uniqid().".".$file->getClientOriginalExtension();
            $path = "private/docsPhoto/".auth()->user()->id."/";
            Storage::disk('local')->put($path.$filename,file_get_contents($file));
            $fileNames[] = $filename;
        }
        return $fileNames;
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
