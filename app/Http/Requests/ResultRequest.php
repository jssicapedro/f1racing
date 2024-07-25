<?php

namespace App\Http\Requests;

use App\Models\Prix;
use Illuminate\Foundation\Http\FormRequest;


class ResultRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        
        $prix = Prix::find($this->Prix_idPrix);
        $numLaps = $prix ? $prix->laps : 0;

        return [
            'Prix_idPrix' => 'required|exists:prix,idPrix',
            'GrandPrix_idGrandPrix' => 'required|exists:grandprix,idGrandPrix',
            'results.*.Driver_idDriver' => [
                'required',
                'exists:driver,idDriver',
                function ($attribute, $value, $fail) {
                    $driverCount = collect(request()->results)->pluck('Driver_idDriver')->countBy();
                    if ($driverCount[$value] > 1) {
                        $fail('A driver cannot be selected more than once.');
                    }
                },
            ],
            'results.*.position' => [
                'required',
                'in:' . implode(',', array_merge(range(1, request()->input('entries')), ['NC', 'DNF'])),
                function ($attribute, $value, $fail) {
                    if ($value != 'DNF' && $value != 'NC') {
                        $positionCount = collect(request()->results)->pluck('position')->countBy();
                        if ($positionCount[$value] > 1) {
                            $fail('A position can only be repeated if it is DNF or NC.');
                        }
                    }
                },
            ],
            'results.*.points' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) {
                    $validPoints = [25, 18, 15, 12, 10, 8, 6, 4, 2, 1];
                    if (!in_array($value, array_merge($validPoints, array_map(function ($p) {
                        return $p + 1;
                    }, $validPoints)))) {
                        $fail('Invalid points value.');
                    }
                }
            ],
            'results.*.fastLapNumber' => 'nullable|integer|min:0|max:' . $numLaps,
            'results.*.fastLapTime' => 'nullable|regex:/^\d{1}:\d{2}\.\d{3}$/',
        ];
    }
}
