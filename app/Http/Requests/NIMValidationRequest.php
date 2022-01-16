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
            'digit_1' => 'required|numeric',
            'digit_2' => 'required|numeric',
            'digit_3' => 'required|numeric',
            'digit_4' => 'required|numeric',
            'digit_5' => 'required|numeric',
            'digit_6' => 'required|numeric',
            'digit_7' => 'required|numeric',
            'digit_8' => 'required|numeric',
            'digit_9' => 'required|numeric',
            'digit_10' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'digit_1.required' => 'Digit 1 wajib diisi',
            'digit_2.required' => 'Digit 2 wajib diisi',
            'digit_3.required' => 'Digit 3 wajib diisi',
            'digit_4.required' => 'Digit 4 wajib diisi',
            'digit_5.required' => 'Digit 5 wajib diisi',
            'digit_6.required' => 'Digit 6 wajib diisi',
            'digit_7.required' => 'Digit 7 wajib diisi',
            'digit_8.required' => 'Digit 8 wajib diisi',
            'digit_9.required' => 'Digit 9 wajib diisi',
            'digit_10.required' => 'Digit 10 wajib diisi',
            'digit_1.numeric' => 'Digit 1 harus berupa angka',
            'digit_2.numeric' => 'Digit 2 harus berupa angka',
            'digit_3.numeric' => 'Digit 3 harus berupa angka',
            'digit_4.numeric' => 'Digit 4 harus berupa angka',
            'digit_5.numeric' => 'Digit 5 harus berupa angka',
            'digit_6.numeric' => 'Digit 6 harus berupa angka',
            'digit_7.numeric' => 'Digit 7 harus berupa angka',
            'digit_8.numeric' => 'Digit 8 harus berupa angka',
            'digit_9.numeric' => 'Digit 9 harus berupa angka',
            'digit_10.numeric' => 'Digit 10 harus berupa angka'
        ];
    }
}
