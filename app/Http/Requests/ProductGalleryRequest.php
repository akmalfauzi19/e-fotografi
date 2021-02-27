<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductGalleryRequest extends FormRequest
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
            'products_id' => 'required|integer|exists:products,id',
            'photo' => 'required|image',
            'is_default' => 'boolean|required'
        ];
    }

    public function messages()
    {
        return [
            'products_id.required' => 'Field Id Produk Masih Kosong',
            'products_id.integer' => 'Id Produk Harus Angka',
            'photo.required' => 'Field Gambar Masih Kosong',
            'photo.image' => 'Data Harus Berupa Gambar',
            'is_default.required' => 'Field Gambar Utama Masih Kosong',
            'is_default.boolean' => 'Harus Pilih Ya Atau Tidak'
        ];
    }

    public function withValidator($validator)
    {
        $messages = $validator->messages();
        foreach ($messages->all() as $message) {
            toastr()->error($message, 'Error');
        }
        return $validator->errors()->all();
    }
}
