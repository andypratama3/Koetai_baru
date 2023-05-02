<?php

namespace App\Http\Requests\Talent;

use Illuminate\Foundation\Http\FormRequest;

class StoreTalentRequest extends FormRequest
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
            'nama' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required'
        ];
    }

    public function message()
    {
        return [
            'required' => 'Attribut tidak Boleh Kosong!',
        ];
    }
}
