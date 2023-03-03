<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SentimentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'message'       => 'required|regex:/[^0-9]/'
        ];
    }
    public function messages()
    {
        return[
            'message.required'  => 'this filed is required',
            'message.regex'     => 'number is not allowed'
        ];
    }
}
