<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rule = [
            'name' => 'required|min:3|unique:skills,name',
            'description' => 'nullable|max:500',
        ];

        switch($this->method()){
            case 'PATCH':
            case 'PUT':
                $rule['name'] = 'required|min:3|unique:skills,name,' .$this->skill->id;
        }

        return $rule;
    }
}
