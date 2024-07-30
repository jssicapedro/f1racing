<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'firstGrandPrix' => 'required',
            'distance' => 'required|numeric|between:0,999.99',
            'length' => 'required|numeric|between:0,999.99',
            'laps' => 'required|integer',
            'info' => 'nullable|string',
            'imgCircuts' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'imgBanner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'imgAbout' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
