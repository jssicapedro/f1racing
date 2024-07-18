<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarRequest extends FormRequest
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
            'with_sprint' => 'required|boolean',
            'Prix_idPrix' => 'required|exists:prix,idPrix',
            'GrandPrix_idGrandPrix' => 'required|exists:grandprix,idGrandPrix',

            'sprint_t1' => 'nullable|date|required_if:with_sprint,true',
            'sprintQualify' => 'nullable|date|required_if:with_sprint,true',
            'sprint' => 'nullable|date|required_if:with_sprint,true',
            'sprint_qualify' => 'nullable|date|required_if:with_sprint,true',
            'sprint_race' => 'nullable|date|required_if:with_sprint,true',

            't1' => 'nullable|date|required_if:with_sprint,false',
            't2' => 'nullable|date|required_if:with_sprint,false',
            't3' => 'nullable|date|required_if:with_sprint,false',
            'qualify' => 'nullable|date|required_if:with_sprint,false',
            'race' => 'nullable|date|required_if:with_sprint,false',
        ];
    }
}
