<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'vacation_days_used' => 'required|integer|between:0,20',
            'vacation_days_left' => 'nullable|integer|between:0,20',
            'role_id' => 'required|integer|exists:roles,id',
            'team_id' => 'nullable|integer|exists:teams,id',
        ];
    }
}
