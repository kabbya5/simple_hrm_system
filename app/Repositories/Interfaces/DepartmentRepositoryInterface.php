<?php

namespace App\Repositories\Interfaces;
use App\Models\Department;

interface DepartmentRepositoryInterface
{
    public function all();

    public function findBySlug(string $slug): ?Department;

    public function store(array $data): Department;

    public function update(Department $department, array $data): bool;

    public function delete(Department $department): bool;

    public function onlyTrash();

    public function forceDelete(string $slug): bool;
}