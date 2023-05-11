<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVacationRequestApproversRequest extends FormRequest
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
            'vacation_request_id' => 'integer|exists:vacation_requests,id',
            'approver_id' => 'integer|exists:employees,id',
            'status' => 'string',
            'reason' => 'string',
            'created_at' => 'date',
            'updated_at' => 'date',
        ];
    }
}
