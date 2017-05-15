<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ValidationRequest extends Request {

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
            // 'g-recaptcha-response' => 'required|recaptcha',
            'email'                => 'email|required|unique:users,email',
            'password'             => 'required|confirmed',
            'name'                => 'required',
            'gender'               => 'required|in:1,2',
            'birth'                => 'required|date',
            'birth_place'          => 'required',
            'thumbnail'            => 'required'
        ];
    }

}
