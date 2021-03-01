<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
     * Get the validation rules that apply to the request
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
            'uuid' => 'required',
            'name' => 'required|max:255',
            'email' => 'required',
            'address' => 'required',
            'date' => 'required|date|after:tomorrow|unique:transactions,date,NULL,id,deleted_at,NULL',
            'number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:12',
            'photo' => 'required|max:2000',
            'transaction_price' => 'required|integer',
            'transaction_status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'Field Id Produk Masih Kosong',
            'product_id.integer' => 'Field Id Produk Harus Angka',
            'user_id.required' => 'Field User id Masih Kosong',
            'user_id.integer' => 'Field User id Harus Angka',
            'uuid.required' => 'Field Kode Transaksi Masih Kosong',
            'photo.required' => 'Field Bukti Transfer Masih Kosong',
            'photo.max' => 'Ukuran File Terlalu Besar, Min 2Mb',
            'name.required' => 'Field Nama Masih Kosong',
            'email.required' => 'Field Email Masih Kosong',
            'address.required' => 'Field Alamat Masih Kosong',
            'date.required' => 'Field Tanggal Masih Kosong',
            'date.date' => 'Data Harus Berformat Tanggal',
            'date.after' => 'Pilih Tanggal Sesi Foto H+2',
            'date.unique' => 'Jam Pada Tanggal Tersebut Sudah Dipesan, Silahkan Pilih di Jam Lain',
            'number.required' => 'Field Nomor Hp Masih Kosong',
            'number.min' => 'Nomor Minimal 12 Angka',
            'transaction_price.required' => 'Field Harga Masih Kosong',
            'transaction_price.integer' => 'Harga Berformat Angka'
        ];
    }
}
