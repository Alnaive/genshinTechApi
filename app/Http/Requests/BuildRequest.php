<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
             'character_id' => 'required',
            'ascension' => 'required',
            'level' => 'required',
            'weapon_id' => 'required',
            'refinement' => 'required',
            'friendship' => 'required',
            'sands' => 'required',
            'goblet' => 'required',
            'circlet' => 'required',
            'equipList' => 'required',
            'normalAttack' => 'required',
            'elementalSkill' => 'required',
            'elementalBurst' => 'required',
            'talent' => 'required',
            'hp' => 'required|max:5',
            'attack' => 'required|max:4',
            'defense' => 'required|max:4',
            'elementalMastery' => 'required|max:4',
            'criticalRate' => 'required',
            'criticalDamage' => 'required',
            'energyRecharge' => 'required',
            'status' => 'required',
        ];
    }
}
