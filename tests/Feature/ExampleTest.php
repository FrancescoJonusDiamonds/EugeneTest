<?php

namespace Tests\Feature;

use App\Http\Controllers\FormController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */



    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /** @test */
    public function mock_creation_of_form_controller(){

        $this->instance(
            FormController::class,
            Mockery::mock(FormController::class, function (MockInterface $mock) {
                $request = 'http POST request!!!';
                $mock->expects($this->once())->withArgs($request)->andReturns();
                // $mock->expects($this->once())->method('store')->with($this->equalTo("$request"));
            })
        );
    }

}
