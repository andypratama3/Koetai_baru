<?php

namespace App\Http\Requests\Anggota;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestAnggota extends FormRequest
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
            'foto' => 'required',
            'devisi' => 'required',
            'instagram' => 'required'
        ];

    }
    public function message()
    {
        return [
        'required' => 'Attribut tidak Boleh Kosong!',
        'nama' => 'Nama Tidak Boleh Kosong!',
        ];
    }
}
