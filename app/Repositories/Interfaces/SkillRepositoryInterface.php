<?php

namespace App\Repositories\Interfaces;

use App\Models\Skill;

interface SkillRepositoryInterface
{
    public function all();

    public function store(array $data): Skill;

    public function update(Skill $skill, array $data): bool;

    public function delete(Skill $skill): bool;
}