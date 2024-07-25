<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrixRequest extends FormRequest
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
                'name' => 'required|string|max:255',
                'grandPrixName' => 'nullable|string|max:255',
                'comunName' => 'nullable|string|max:255',
                'country' => 'required|string|max:255',
                'firstGrandPrix' => 'required|',
                'distance' => 'required|numeric|between:0,999.99',
                'length' => 'required|numeric|between:0,999.99',
                'lap' => 'required|integer',
                'info' => 'nullable|text',
        ];
    }
}
