<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
            //
            'store'   => ['required', 'string', 'max:30'],
            'name'      => ['required', 'string', 'max:30'],
            'name_kana' => ['required', 'string', 'max:30', 'regex:/^[ァ-ロワンヴー]*$/u'],
            'email'     => ['required', 'email'],
            'body'      => ['required', 'string', 'max:1000'],
        ];
    }

    // erroe message

    public function messages(){
        return [
            'name.required' => ':attributeは必須項目です。',
        ];
    }
}
