<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
        return [
            //
            "title" => 'sometimes|string|max:40',
            "description" => 'sometimes|nullable|string',
            'pirority' => 'sometimes|integer|min:1|max:5',
        ];
    }
    public function messages(): array{
        return [
            "title.string" => "Title must be a string",
            "title.max" => "Title must be less than 40 characters",
            "description.string" => "Description must be a string",
            "pirority.integer" => "Pirority must be an integer",
        ];
    }
}
