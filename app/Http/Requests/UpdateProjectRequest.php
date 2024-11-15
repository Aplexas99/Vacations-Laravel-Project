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
            'name' => 'string|max:255|unique:projects,name,' . $this->route('id'),
            'description' => 'string|max:255',
            'team_id' => 'integer|exists:teams,id',
            'start_date' => 'date|before:end_date',
            'end_date' => 'date|after:start_date',
            'project_manager_id' => 'integer|exists:employees,id'
        ];
    }
}
