<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'image_desktop' => ['nullable', 'file', 'max:1024'],
            'image_mobile' => ['nullable', 'file', 'max:1024'],
            'brief_content' => ['required', 'string'],
            'content' => ['required', 'string'],
        ];
    }
}
