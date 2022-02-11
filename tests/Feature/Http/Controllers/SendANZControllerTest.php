<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\SendANZController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SendANZControllerTest extends TestCase
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
        $testController = new SendANZController();

        $request = 'http POST request!!!';

        $result = $testController->send($request);
        $json = $result->json();
        $this->assertSame('123', $json[0]['merchant_id']);
    }

    /** @test */
    function check_return_merchant_key() {
        $testController = new SendANZController();

        $request = 'http POST request!!!';

        $result = $testController->send($request);
        $json = $result->json();
        $this->assertSame('qwerty', $json[0]['merchant_key']);
    }
}
