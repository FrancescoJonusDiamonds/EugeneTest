<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SendANZController extends Controller
{
    public function send(Request $request) {

        $replacements = array('cvv' => '000', 'merchant_id' => 456, 'merchant_key' => 'asdf');

        $finalArray = array_replace($request, $replacements);

        $myJSON = json_encode($finalArray);

        $responseFromANZ = Http::post('http://anz.com', $myJSON);

    }
}
