<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FormController extends Controller
{

    public function store()
    {


        $creditcardn = (request('creditcardn'));
        $creditcardna = (request('creditcardna'));
        $validu = (request('validu'));
        $amounttot = (request('amounttot'));

        

        if () {

            return \App::call('bla\bla\ControllerName@functionName');

        } elseif () {

            return \App::call('bla\bla\ControllerName@functionName');

        } else {}

    }

}
