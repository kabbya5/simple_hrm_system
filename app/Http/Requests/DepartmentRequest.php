<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'name' => 'required|min:2|unique:departments,name',
            'position' => 'nullable|integer',
        ];

        switch($this->method()){
            case 'PATCH':
            case 'PUT':
                $rule['name'] = 'required|min:2|unique:departments,name,' .$this->department->id;
        }

        return $rule;
    }
}
