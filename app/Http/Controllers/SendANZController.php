<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SendANZController extends Controller
{
    public function send(Request $request) {

        // Here I replace some values of the array that are specific for the case ANZ/NAB
        $replacements = array('cvv' => '000', 'merchant_id' => 456, 'merchant_key' => 'asdf');

        $finalArray = array_replace($request, $replacements);

        $myJSON = json_encode($finalArray);

        // Here I order to fake any response from the website we should call
        Http::fake([

            'anz.com/*' => Http::response('Hello World', 200, $headers),

        ]);

       $responseFromANZ = Http::post('http://anz.com', $myJSON);

    }
}
