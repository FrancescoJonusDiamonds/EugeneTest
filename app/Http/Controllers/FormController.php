<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{

    public function store()
    {
        var_dump(request('creditcardn'));
        var_dump(request('creditcardna'));
        var_dump(request('validu'));
        var_dump(request('amounttot'));
    }

}
