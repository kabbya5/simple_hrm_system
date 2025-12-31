<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,web',
            'first_name' => 'required|min:2|max:200',
            'last_name' => 'required|min:3|max:200',
            'department_id' => 'required|integer',
            'skills' => 'required|array',
            'email' => 'required|unique:employees,email',
            'phone' => 'nullable|unique:employees,phone',
            'date_of_birth' => 'nullable|date',
            'hire_date' => 'nullable|date',
        ];

        switch ($this->method()){
            case "PUT":
            case "PATCH":
                $rule['email'] = 'required|unique:employees,email,' .$this->employee->id;
                $rule['phone'] = 'nullable|unique:employees,phone,' .$this->employee->id;
        }        

        return $rule;
    }
}
