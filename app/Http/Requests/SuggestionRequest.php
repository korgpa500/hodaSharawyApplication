<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuggestionRequest extends FormRequest
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
            'sender_name' => 'required|min:2',
            'sender_email' => 'required|email',
            'sender_message' => 'required|min:20',
            'title' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'sender_name.required' => 'You must enter your name!!!!',
            'sender_name.min' => 'You must enter Valid name!!!!',
            'sender_email.email' => 'You must enter Valid E-mail!!!!',
            'sender_message.min' => 'You must enter at least 20 letter in your message!!!!',
        ];
    }
}
