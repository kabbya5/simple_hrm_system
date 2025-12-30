<?php

namespace App\Repositories\Eloquents;
use App\Models\Department;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    public function all(){
        return Department::orderBy('position','asc')->get();
    }

    public function store(array $data): Department 
    {
        return Department::create($data);
    }

    public function findBySlug(string $slug): ?Department
    {
        return Department::findOrFail($slug);
    }

    public function update(Department $department,$data): bool
    {
        return $department->update($data);
    }

    public function delete(Department $department): bool
    {
        return $department->delete();
    }

    public function onlyTrash()
    {
        $departments = Department::onlyTrash()->latest()->get();
    }

    public function forceDelete(string $slug): bool
    {
        return Department::onlyTrash()->find($slug)->delete;
    }
}