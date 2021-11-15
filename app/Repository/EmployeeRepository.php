<?php
namespace App\Repository;

use Illuminate\Support\Collection;

interface EmployeeRepository
{
    public function getAll(): Collection;

}