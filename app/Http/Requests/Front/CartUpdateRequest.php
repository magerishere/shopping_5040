<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class CartUpdateRequest extends FormRequest
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
            'variation_ids' => ['required', 'array'],
            'variations_ids.*.variation_id' => ['required', 'exists:variations,id'],
            'variations_ids.*.qty' => ['required', 'integer', 'min:1']
        ];
    }
}
