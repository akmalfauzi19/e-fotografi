<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Illuminate\Foundation\Http\FormRequest;

class TransactionAdminRequest extends FormRequest
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
        $id = $this->route('transaction');

        return [
            'name' => 'required|max:255',
            'number' => 'required',
            'date' => 'required|date|unique:transactions,date,' . $id . ',id,deleted_at,NULL',
            'transaction_price' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Field Nama Masih Kosong',
            'name.max' => 'Melebihi Batas Karakter',
            'number.required' => 'Field Nomor HP Masih Kosong',
            'date.required' => 'Field Gambar Masih Kosong',
            'date.date' => 'Data Harus Berformat Tanggal',
            'date.unique' => 'Tanggal Sudah Dipilih',
            'transaction_price.required' => 'Field Harga Masih Kosong'
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
