<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\SendNABController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SendNABControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    function check_return_merchant_id() {
        $testController = new SendNABController();

        $request = 'http POST request!!!';

        $result = $testController->send($request);
        $xml = $result->XML();
        $this->assertSame('456', $xml[0]['merchant_id']);
    }

    /** @test */
    function check_return_merchant_key() {
        $testController = new SendNABController();

        $request = 'http POST request!!!';

        $result = $testController->send($request);
        $xml = $result->XML();
        $this->assertSame('asdf', $xml[0]['merchant_key']);
    }

}
