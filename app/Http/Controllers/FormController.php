<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {


        $creditcardn = (request('creditcardn'));
        $creditcardna = (request('creditcardna'));
        $validu = (request('validu'));
        $amounttot = (request('amounttot'));

        $arrOfGivenDAta = array('card_number' => $creditcardn, 'card_name' => $creditcardna, 'cvv' => 0, 'amount' => 4, 'merchant_id' => 0, 'merchant_key' => 0);


        if ($request->input('action') == "NAB") {

            return \App::call("App\Http\SendNABController@send(" . $arrOfGivenDAta . ")");

        } elseif ($request->input('action') == "ANZ") {

            return \App::call("App\Http\SendANZController@send(" . $arrOfGivenDAta . ")");

        } else {
            return response()->json(['message' => 'Data not found.'], 404);
        }

    }

}
