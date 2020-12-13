<?php

namespace App\Http\Controllers;

use App\Models\DocumentRequest;
use App\Models\DocumentValidInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

include(app_path()."\Library\FilesHandler.php");

class DocumentValidInfoController extends Controller
{

    

    function create($request_id)
    {
        return view('DocumentValidInfo_Create')->with("request_id", $request_id);
    }

    function store($request_id)
    {   

        //проверяем, существует ли корневой обьект подачи документов, если нет - что-то пошло не так
        $documentRequest=DocumentRequest::findAndValid($request_id);
        if(is_null($documentRequest)) abort(404);

        //валидируем отправленную форму
        $request = request()->validate([
            'validDoc_document_type'=>'required',
            'validDoc_serial'=>'required',
            'validDoc_date'=>'required',
            'validDoc_number'=>'required',
            'validDoc_subdivision_code'=>'required',
            'validDoc_photos'=>'required',
            'validDoc_photos.*'=>'mimes:jpeg,jpg,png|max:2048'
        ]);

        //пробуем получить id уже заполенных данных и формируем путь
        $docValID = $documentRequest->docValid_info_ID;
        $path = "private/UsersData/".auth()->user()->id."/".$request_id."/"."validation_docPhoto"."/";

        //
        if($docValID==null)
        {   
            $docValidInfo = $this->fillObject($request);
            $fileNames = WriteFiles($request['validDoc_photos'], $path);         
            $docValidInfo['validDoc_photosPath']=$fileNames;
            
            $docValidInfoObject = new DocumentValidInfo($docValidInfo);
            $docValidInfoObject->request_id=$documentRequest->id;
            $docValidInfoObject->save();
            $documentRequest->docValid_info_ID=$docValidInfoObject->id;
            $documentRequest->update();
        }
        else
        {
            $docValidInfoObject=DocumentValidInfo::find($docValID)->first();   
            DeleteFiles($docValidInfoObject->validDoc_photosPath, $path);
            $docValidInfo = $this->fillObject($request);
            $docValidInfo['validDoc_photosPath'] = WriteFiles($request['validDoc_photos'], $path);
            $docValidInfoObject->update($docValidInfo);
        }

        return redirect()->route('request', [$request_id]);
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
