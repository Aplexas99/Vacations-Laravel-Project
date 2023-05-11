<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'name' => 'string|max:255|unique:projects',
            'description' => 'string|nullable',
            'start_date' => 'date',
            'end_date' => 'date',
            'project_manager_id' => 'integer|exists:employees,id',
            'team_id' => 'integer|exists:teams,id',
        ];
    }
}
