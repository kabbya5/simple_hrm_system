<?php

namespace App\Repositories\Interfaces;

use App\Models\Employee;

interface EmployeeRepositoryInterface
{
    public function all();

    public function store(array $data): Employee;

    public function update(Employee $employee, array $data): bool;

    public function delete(Employee $employee): bool;
}