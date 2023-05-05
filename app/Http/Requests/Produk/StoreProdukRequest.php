<?php

namespace App\Http\Requests\Produk;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdukRequest extends FormRequest
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
            'stock' => 'required',
            'harga' => 'required'
        ];
    }
    public function message(){
        return [
            'required' => 'Atribut Tidak Boleh Kosong!'
        ];
    }
}
