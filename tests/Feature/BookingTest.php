<?php

namespace Tests\Feature;

use Mockery;
use Mockery\MockInterface;
use App\Http\Controllers\BookingController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookingTest extends TestCase
{
    /**
     * Test Booking - Able to reach select-office-and-employee page
     *
     * @return void
     */
    public function test_select_office_employee()
    {
        $response = $this->get('/booking/select-office-and-employee');

        $response->assertStatus(200);
    }
}