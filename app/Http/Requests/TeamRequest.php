<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name' => 'required|string|max:25',
            'fullName' => 'required|string|max:45',
            'base' => 'required|string|max:45',
            'country' => 'required|exists:countries,name',
            'teamChief' => 'required|string|max:100',
            'technicalChief' => 'required|string|max:100',
            'firstTeamEntry' => 'required',
            'polePositions' => 'required|integer',
            'worldChampionShips' => 'required|integer',
            'color' => 'required|string|max:45',
            'imgFullName' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'imgLogo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'imgTeam' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
