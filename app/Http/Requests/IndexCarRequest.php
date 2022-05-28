<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexCarRequest extends FormRequest
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
            'per_page' => ['sometimes', 'numeric', Rule::in([2, 4])],
            'color' => ['sometimes'],
            'year' => ['sometimes'],
            'top_speed' => ['sometimes'],
            'brand' => ['sometimes'],
            'carModel' => ['sometimes'],
            'sort' => ['sometimes', 'array'],
            'sort.*' => ['distinct'],
            'from' => ['sometimes', 'array'],
            'to' => ['sometimes', 'array'],
        ];
    }
}
