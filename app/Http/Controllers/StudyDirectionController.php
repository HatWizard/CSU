<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudyDirectionController extends Controller
{
    public function create($request_id)
    {
        return view("StudyDirection@Create")->with("request_id", $request_id);;
    }
}
