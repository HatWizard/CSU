<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    function create()
    {
        return view('PersonalInfoCreate');
    }

    function store()
    {
        $data = request()->validate([
            'name'=>'required',
            'surname'=>'required',
            'phone_number'=>'required',
            'response_email'=>'required',
            'birthdate'=>'required',
        ]);          
    }
}
