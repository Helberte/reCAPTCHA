<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class formController extends Controller
{
    
    public function index(){
        return View("welcome");
    }

    public function store(Request $request){

        
        $url_req = 'https://www.google.com/recaptcha/api/siteverify?secret=6LfIdB4lAAAAAGiyVV0LEKSp0Omo7wPMvDCP9hOz&response=' . $request["g-recaptcha-response"];

        $response = Http::post($url_req)->json();

        if($response['success'] == false){
            return redirect('/')->with('msg', 'Responda o reCAPTCHA');
        }else{
            return View("welcome");
        }
    }
}