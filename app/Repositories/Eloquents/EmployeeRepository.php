<?php

namespace App\Repositories\Eloquents;

use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function all(){
        return Employee::with('department')->latest()->paginate(20);
    }
    
    public function store(array $data): Employee
    {
        return Employee::create($data);
    }

    public function update(Employee $employee,$data): bool
    {
        return $employee->update($data);
    }

    public function delete(Employee $employee): bool
    {
        return $employee->delete();
    }
}