<?php

namespace App\Http\Controllers;

use App\Models\DocumentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use League\CommonMark\Block\Element\Document;

class DocumentRequestController extends Controller
{


    function create()
    {
        $limit = config("constants.options.document_requests_limit");
        if(auth()->user()->DocumentRequests->where("deleted", "=", false)->count() >= $limit){
            return Redirect::back()->withErrors(["Вы можете создать не более {$limit} анкет."]);
        } 

        $request=new DocumentRequest;
        $request->user_id=auth()->user()->id;
        $request->save();
        return redirect()->route('request', [$request->id]);
    }


    function index($request_id){
        $request = DocumentRequest::findAndValid($request_id);

        if($request!=null and auth()->user()->id==$request->user_id){
            return view('DocumentRequest_Create')->with("requestData", $request);
        }
        return abort(404);
    }

    function store($request_id){
        $request = DocumentRequest::findAndValid($request_id);
        if($request==null) return redirect()->route("home");

        if($request->is_completed()){
            $request->record_state=2;
            $request->save();
        }
        return redirect()->route('home');
    }

    function delete($request_id){
        $request = DocumentRequest::findAndValid($request_id);
        if($request==null or $request->record_state!=1) return redirect()->route("home");

        $request->deleted=true;
        $request->save();
        return redirect()->route("home");
    }


}
