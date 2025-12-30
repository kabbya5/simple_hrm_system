<?php

namespace App\Repositories\Eloquents;

use App\Models\Skill;
use App\Repositories\Interfaces\SkillRepositoryInterface;

class SkillRepository implements SkillRepositoryInterface
{
    public function all(){
        return Skill::latest()->paginate(20);
    }
    
    public function store(array $data): Skill
    {
        return Skill::create($data);
    }

    public function update(Skill $skill,$data): bool
    {
        return $skill->update($data);
    }

    public function delete(Skill $skill): bool
    {
        return $skill->delete();
    }
}