<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderTiket extends FormRequest
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
            'jumlah' => 'required',
            'kategori_tiket' => 'required'
        ];

    }
    public function message(){

        return [
            'required' => 'Atribut Tidak Boleh Kosong!'
        ];
    }
}