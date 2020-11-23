<?php

namespace App\Http\Controllers;

use App\Models\DocumentRequest;
use Illuminate\Http\Request;

class DocumentRequestController extends Controller
{

    function create()
    {
        $request = DocumentRequest::where('user_id', '=', auth()->user()->id)->get()->first();

        if($request==null){
            $request=new DocumentRequest;
            $request->user_id=auth()->user()->id;
            $request->save();
        }
    
        return view('DocumentRequest_Create')->with("requestData", $request);
    }

}
