<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isUpdate = $this->method() === 'PUT' || $this->method() === 'PATCH';
        return [
            'title' => $isUpdate ? 'sometimes|required|string|max:255' : 'required|string|max:255',
            'author' => $isUpdate ? 'sometimes|required|string|max:255' : 'required|string|max:255',
            'description' => $isUpdate ? 'sometimes|required|string' : 'required|string',
            'year' => $isUpdate ? 'sometimes|required|integer|min:1900|max:' . date('Y') : 'required|integer|min:1900|max:' . date('Y'),
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'author.required' => 'The author field is required.',
            'description.required' => 'The description field is required.',
            'year.required' => 'The year field is required.',
            'year.integer' => 'The year must be an integer.',
            'year.min' => 'The year must be at least 1900.',
            'year.max' => 'The year may not be greater than the current year.',
        ];
    }
}
