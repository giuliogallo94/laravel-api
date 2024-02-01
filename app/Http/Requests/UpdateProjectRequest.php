<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'title' => ['required', 'max:200', 'min:3', Rule::unique('projects')->ignore($this->project)],
        'type_id' => ['nullable', 'numeric', 'exists:types,id'],
        'link' => ['required'],
        'date' => ['required'],
        'project_image' => ['nullable', 'max:512'],
        'description' => ['nullable'],
        'technologies' => ['exists:technologies,id']
        ];
    }
}
