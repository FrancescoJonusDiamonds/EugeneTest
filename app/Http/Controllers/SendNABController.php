<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SendNABController extends Controller
{
    public function send(Request $request) {

        $replacements = array('cvv' => '000', 'merchant_id' => 123, 'merchant_key' => 'qwerty');

        $finalArray = array_replace($request, $replacements);

        $myXML = new SimpleXMLElement('<root/>');

        array_walk_recursive($finalArray, array ($myXML, 'addChild'));

        $responseFromNAB = Http::post('http://anz.com', $myXML);

    }
}
