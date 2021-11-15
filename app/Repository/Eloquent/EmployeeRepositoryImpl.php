<?php
namespace App\Repository\Eloquent;

use App\Models\Employee;
use App\Repository\EmployeeRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class EmployeeRepositoryImpl extends BaseRepositoryImpl implements EmployeeRepository
{

    /**
    * EmployeeRepositoryImpl constructor.
    *
    * @param Employee $model
    */
   public function __construct(Employee $model)
   {
       parent::__construct($model);
   }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function create($collection = []): Model
    {
        return $this->model->create([
                'first_name' => $collection['firstName'],
                'last_name' => $collection['lastName'],
                'payroll_number' => $collection['payrollNumber'],
                'email' => $collection['email']
            ]);
    }

}