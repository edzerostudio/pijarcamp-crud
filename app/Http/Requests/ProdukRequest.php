<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_produk' => ['required', 'string', 'min:3', 'max:255'],
            'keterangan' => ['required', 'string'],
            'harga' => ['required', 'numeric'],
            'jumlah' => ['required', 'numeric']
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function validated()
    {
        return [
            'nama_produk' => $this->nama_produk,
            'keterangan' => $this->keterangan,
            'harga' => $this->harga,
            'jumlah' => $this->jumlah
        ];
    }
}
