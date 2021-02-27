<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Field email Masih Kosong',
            'email.email' => 'Isikan Sesuai Format Email',
            'email.exists' => 'Email Anda Tidak Terdaftar',
            'password.required' => 'Field Password Masih Kosong',
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
