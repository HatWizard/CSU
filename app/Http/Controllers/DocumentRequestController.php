<?php

namespace App\Http\Controllers;

use App\Models\DocumentRequest;
use Illuminate\Http\Request;

class DocumentRequestController extends Controller
{

    function index()
    {
        $request = DocumentRequest::where('user_id', '=', auth()->user()->id)->first();
        if($request==null)
        {
            //создаем новый request, если его нет
            $user = auth()->user();
            $request = new DocumentRequest;
            $request->user_id=auth()->user()->id;
            $request->save();
        }


        return view('DocumentRequestShow', ['requestData'=>$request]);
    }



}
