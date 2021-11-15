<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OfficeTest extends TestCase
{

    use DatabaseTransactions;
    /**
     * Test Office - Able to reach the List
     *
     * @return void
     */
    public function test_show_all()
    {
        $response = $this->get('/office/all');

        $response->assertStatus(200);
    }

    /**
     * Test Office - Able to reach Register page
     *
     * @return void
     */
    public function test_register()
    {
        $response = $this->get('/office/register');

        $response->assertStatus(200);
    }

    /**
     * Test Office - Able to register new office
     *
     * @return void
     */
    public function test_register_submit()
    {
        $response = $this->post('/employee/register', [
            'name' => 'Testing Tower',
            'numberOfSeats' => '5'
        ]);

        $response->assertStatus(302)
            ->assertSessionDoesntHaveErrors([
            'name',
            'numberOfSeats'
        ]);;
    }

    /**
     * Test Office - Error with empty name field
     *
     * @return void
     */
    public function test_register_submit_name_fail()
    {
        $response = $this->post('/office/register', [
            'name' => '',
            'numberOfSeats' => '2'
        ]);

        $response->assertStatus(302)
            ->assertSessionHasErrors([
            'name'
        ]);;
    }

    /**
     * Test Office - Error with invalid input: integer
     *
     * @return void
     */
    public function test_register_submit_seat_fail()
    {
        $response = $this->post('/office/register', [
            'name' => 'Testing Tower',
            'numberOfSeats' => 'abc'
        ]);

        $response->assertStatus(302)
            ->assertSessionHasErrors([
            'numberOfSeats'
        ]);;
    }
}