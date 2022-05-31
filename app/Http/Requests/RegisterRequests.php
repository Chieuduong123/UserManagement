<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequests extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'password' => ['required','min:6','regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'],
        ];
    }

    /**
     * Determine message.
     *
     * @return array
     */
    public function messages()
    {
        return [
			'name.required' => 'Họ và tên là trường bắt buộc',
			'email.required' => 'Email là trường bắt buộc',
			'password.required' => 'Mật khẩu là trường bắt buộc',
			'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
            'password.regex' => 'Mật khẩu phải chứa ít nhất 1 chữ Hoa, chữ số và kí tự đặc biệt',
          
        		
        ];
    }
}