<?php

namespace App\Http\Controllers;

use app\Interfaces\PaymentInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

abstract class FormController implements PaymentInterface
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {


        $creditcardn = (request('creditcardn'));
        $creditcardna = (request('creditcardna'));
        $validu = (request('validu'));
        $amounttot = (request('amounttot'));

        // Here I create my Array to pass to the correct controller, and I also create a multidimensional array to create the nesting for the tag "from"
        $arrOfGivenDAta = array("from" => array('card_number' => $creditcardn, 'card_name' => $creditcardna, 'cvv' => 0), 'amount' => 4, 'merchant_id' => 0, 'merchant_key' => 0);

        // I check what button was pressed and I call the correct class, ANZ or NAB
        if ($request->input('action') == "NAB") {

            return \App::call("App\Http\SendNABController@send(" . $arrOfGivenDAta . ")");

        } elseif ($request->input('action') == "ANZ") {

            return \App::call("App\Http\SendANZController@send(" . $arrOfGivenDAta . ")");

        } else {
            return response()->json(['message' => 'Data not found.'], 404);
        }

    }

}
