<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Repository\EmployeeRepository;

class EmployeeController extends Controller
{
    public $employeeRepo;

    public function __construct(EmployeeRepository $employeeRepo)
    {
        $this->employeeRepo = $employeeRepo;
    }

    /**
     * Register new employee
     * 
     * If all values are validated, new employee will be created
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {
        // Validate Request
        $validatedData = $this->validete($request);
        
        // Create Employee using validate data
        $this->employeeRepo->create($validatedData);

        $request->session()->flash('message', 'New Employee is created!!');
        
        return redirect('/employee/all');

    }

    /**
     * Show all employees
     *
     * @return void
     */
    public function showAll()
    {
        $employees = $this->employeeRepo->getAll();
        return view('employee.list', [
            'employees' => $employees
        ]);
    }

    /**
     * Validate Employee Request
     *
     * @param Request $request
     * @return void
     */
    private function validete(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'bail|required|max:255',
            'lastName' => 'bail|required|max:255',
            'payrollNumber' => ['required', Rule::unique('employees', 'payroll_number'), 'numeric'],
            'email' => ['required', Rule::unique('employees', 'email'), 'email']
        ]);

        return $validatedData;
    }
}