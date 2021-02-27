<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $id = $this->route('product');

        return [
            'name' => 'required|max:255|unique:products,name,' . $id . ',id,deleted_at,NULL',
            'type' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|integer'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Field Nama Masih Kosong',
            'name.max' => 'Melebihi Jumlah Maksimal Huruf',
            'name.unique' => 'Nama Produk Sudah Ada',
            'type.required' => 'Field Kategori Masih Kosong',
            'type.max' => 'Melebihi Jumlah Maksimal Huruf',
            'description.required' => 'Field Description Masih Kosong',
            'price.required' => 'Field Harga Masih Kosong',
            'price.integer' => 'Harga Harus Angka'
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
