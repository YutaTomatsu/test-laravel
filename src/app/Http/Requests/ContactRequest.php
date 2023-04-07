<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'address' =>['required',],
            'firstname' =>['required', 'string', 'max:255'],
            'lastname' =>['required', 'string', 'max:255'],
            'email' =>['required', 'string', 'email', 'max:255'],
            'post' =>['required','convert to half width','regex:/^\d{3}-\d{4}$/'],
            'address' =>['required',],
            'content' =>['required','max:120'],
            
        ];
    }

    public function messages()
     {
         return [
             'firstname.required' => '名前を入力してください',
             'firstname.string' => '名前を文字列で入力してください',
             'firstname.max' => '名前を255文字以下で入力してください',

             'lastname.required' => '名前を入力してください',
             'lastname.string' => '名前を文字列で入力してください',
             'lastname.max' => '名前を255文字以下で入力してください',

             'email.required' => 'メールアドレスを入力してください',
             'email.string' => 'メールアドレスを文字列で入力してください',
             'email.email' => '有効なメールアドレス形式を入力してください',
             'email.max' => 'メールアドレスを255文字以下で入力してください',

             'post.required' => '郵便番号を入力してください',
             'post.regex' => '正しい郵便番号のフォーマットで入力してください',
             'post.convert to half width' =>'半角数字で入力してください。',

             'address.required' => '住所を入力してください',

             'content.required' => 'ご意見を入力してください',
             'content.max' => 'ご意見を120文字以下で入力してください',
         ];
     }
}
