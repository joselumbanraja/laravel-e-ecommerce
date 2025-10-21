<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateproductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'sku'           => 'required|string|max:50',
            'nama_product'  => 'required|string|max:255',
            'type'          => 'nullable|string|max:100',
            'kategory'      => 'nullable|string|max:100',
            'harga'         => 'required|numeric|min:0',
            'discount'      => 'nullable|numeric|min:0|max:100',
            'quantity'      => 'required|integer|min:0',
            'quantity_out'  => 'nullable|integer|min:0',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'     => 'required|boolean',
        ];
    }
}
