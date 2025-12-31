<?php

namespace App\Repositories\Eloquents;

use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function all($department_id = null, $page = 1){
        return Employee::with('department')
            ->when($department_id,function($q) use($department_id){
                $q->where('department_id', $department_id);
            })->latest()->paginate(20, ['*'], 'page', (int) $page);
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