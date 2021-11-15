<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{

    use DatabaseTransactions;
    /**
     * Test Employee - Able to reach the List
     *
     * @return void
     */
    public function test_showAll()
    {
        $response = $this->get('/employee/all');

        $response->assertStatus(200);
    }

    /**
     * Test Employee - Able to reach Register page
     *
     * @return void
     */
    public function test_registerForm()
    {
        $response = $this->get('/employee/register');

        $response->assertStatus(200);
    }

    /**
     * Test Employee - Able to register new employee
     *
     * @return void
     */
    public function test_register_submit()
    {
        $response = $this->post('/employee/register', [
            'firstName' => 'Peter',
            'lastName' => 'Marvin',
            'payrollNumber' => '77777',
            'email' => 'petermarvin2021@example.com'
        ]);

        $response->assertStatus(302)
            ->assertSessionDoesntHaveErrors([
            'firstName',
            'lastName',
            'payrollNumber',
            'email'
        ]);;;
    }

    /**
     * Test Employee - Error with empty firstName field
     *
     * @return void
     */
    public function test_register_submit_firstname_fail()
    {
        $response = $this->post('/employee/register', [
            'firstName' => '',
            'lastName' => 'Tester',
            'payrollNumber' => '22222',
            'email' => 'petermarvin2021@example.com'
        ]);


        $response->assertStatus(302)
            ->assertSessionHasErrors([
            'firstName'
        ]);;
    }

    /**
     * Test Employee - Error with empty lastName field
     *
     * @return void
     */
    public function test_register_submit_lastname_fail()
    {
        $response = $this->post('/employee/register', [
            'firstName' => 'Tester',
            'lastName' => '',
            'payrollNumber' => '22222',
            'email' => 'petermarvin2021@example.com'
        ]);


        $response->assertStatus(302)
            ->assertSessionHasErrors([
            'lastName'
        ]);;
    }

    /**
     * Test Employee - Error with duplicate payroll number field
     *
     * @return void
     */
    public function test_register_submit_duplicate_payroll_number_fail()
    {
        $response = $this->post('/employee/register', [
            'firstName' => 'Tester',
            'lastName' => 'Demo',
            'payrollNumber' => '22222',
            'email' => 'petermarvin2021@example.com'
        ]);

        $response = $this->post('/employee/register', [
            'firstName' => 'Peter',
            'lastName' => 'Apple',
            'payrollNumber' => '22222',
            'email' => 'petermarvin2021@example.com'
        ]);


        $response->assertStatus(302)
            ->assertSessionHasErrors([
            'payrollNumber'
        ]);;
    }

    /**
     * Test Employee - Error with duplicate email field
     *
     * @return void
     */
    public function test_register_submit_duplicate_email_fail()
    {
        $response = $this->post('/employee/register', [
            'firstName' => 'Tester',
            'lastName' => 'Demo',
            'payrollNumber' => '22222',
            'email' => 'petermarvin2021@example.com'
        ]);

        $response = $this->post('/employee/register', [
            'firstName' => 'Peter',
            'lastName' => 'Apple',
            'payrollNumber' => '33333',
            'email' => 'petermarvin2021@example.com'
        ]);


        $response->assertStatus(302)
            ->assertSessionHasErrors([
            'email'
        ]);;
    }
}