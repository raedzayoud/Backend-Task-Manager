<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            "title" => 'required|string|max:40',
            "description" => 'nullable|string',
            'pirority' => 'required|in:high,medium,low',
          //  'user_id'=> 'required|exists:users,id',
        ];
    }
    public function messages(): array
    {
        return [
            "title.required" => "Title is required",
            "title.string" => "Title must be a string",
            "title.max" => "Title must be less than 40 characters",
            "description.string" => "Description must be a string",
            "pirority.required" => "Pirority is required",
            "pirority.integer" => "Pirority must be an integer",
        ];
    }
}
