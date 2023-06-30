<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'nama_penerima'=> 'required',
            'nomor_telpon'=> 'required',
            'prod_id'=> 'required',
            'prod_qty'=> 'required',
            'prod_ukuran'=> 'required',
            'total'=> 'required',
            'alamat'=> 'required',
        ];
    }

    public function message(){
        return [
            'required' => "Produk Tidak Boleh Kosong",

        ];

    }
}
