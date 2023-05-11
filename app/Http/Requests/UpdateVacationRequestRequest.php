<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVacationRequestRequest extends FormRequest
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
            'employee_id' => 'integer|exists:employees,id',
            'end_date' => 'date|after_or_equal:start_date',
            'start_date' => 'date',
            'status' => 'string', 
            'note' => 'string',
        ];
    }
}
