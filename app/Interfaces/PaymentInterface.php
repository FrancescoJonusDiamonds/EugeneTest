<?php

namespace app\Interfaces;

use Illuminate\Http\Request;

interface PaymentInterface {

    /**
     * @param Request $request
     * @return mixed
     */

    public function store(Request $request);

}
