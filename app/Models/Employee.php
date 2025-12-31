<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 
        'date_of_birth', 'hire_date', 'image_path',
        'department_id',
    ];

    public function getFullNameAttribute(){
        return ucfirst($this->first_name. ' ' . $this->last_name);
    }

    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function skills(){
        return $this->belongsToMany(Skill::class,'employee_skill', 'employee_id', 'skill_id');
    }
}
