<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NIMValidationRequest extends FormRequest
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

    protected $stopOnFirstFailure = true;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'digit' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'digit.required' => 'NIM wajib diisi',
            'digit.numeric' => 'NIM harus berupa angka'
        ];
    }
}
