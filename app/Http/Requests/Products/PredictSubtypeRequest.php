<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class PredictSubtypeRequest extends FormRequest
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
            'sugar' => 'required|numeric',
            'calories' => 'required|numeric',
            'color' => 'required|array|size:4',
            'gasification' => 'required|numeric',
        ];
    }
}
