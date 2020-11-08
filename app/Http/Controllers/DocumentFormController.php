<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentFormController extends Controller
{
    function index($stage=1)
    {
        if(isset($stage)){
            $_SESSION['docreq_stage']=$stage;
            return view("documentFormPage".$stage);
        }

        if(isset($_SESSION['docreq_stage'])){       
            return view("documentFormPage".$_SESSION['docreq_stage']);
        }

        $_SESSION['docreq_stage']=1;

        return view("documentFormPage1");
    }



}
