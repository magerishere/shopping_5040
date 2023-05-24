<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'sku' => ['required', 'string', 'max:255'],
            'stock' => ['nullable', 'integer', 'min:0'],
            'max_order' => ['nullable', 'integer', 'min:1'],
            'price' => ['required', 'numeric', 'min:1'],
            'slug' => ['required', 'string', 'max:255'],
            'image_desktop' => ['nullable', 'file', 'max:1024'],
            'image_mobile' => ['nullable', 'file', 'max:1024'],
            'brief_content' => ['required', 'string'],
            'content' => ['required', 'string'],
        ];
    }
}
