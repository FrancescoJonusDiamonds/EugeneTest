<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SendNABController extends Controller
{
    public function send(Request $request) {

        // Here I replace some values of the array that are specific for the case ANZ/NAB
        // $replacements = array('cvv' => '000', 'merchant_id' => 123, 'merchant_key' => 'qwerty');

        // $finalArray = array_replace($request, $replacements);

        $myXML = new SimpleXMLElement('<root/>');

        array_walk_recursive($request, array ($myXML, 'addChild'));

        // Here I order to fake any response from the website we should call
        /*Http::fake([

            'nab.com/*' => Http::response('Hello World', 200, $headers),

        ]);*/

        $responseFromNAB = Http::post('http://nab.com', $myXML);

        return $myXML;

    }
}
