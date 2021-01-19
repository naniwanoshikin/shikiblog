<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BLogRequest extends FormRequest
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
        return [ // タイトル・内容は必須
            'title' => 'required | max:100',
            'content' => 'required',
        ];
    }
}
