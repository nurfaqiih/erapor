<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RaporRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (\Auth::user()->role != 4)
        {
            return false;
        }

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
            'NO'  => 'numeric|between:0,100',
            'NDs' => 'numeric|between:0,100',
            'NAt' => 'numeric|between:0,100',
            'NJ'  => 'numeric|between:0,100',
            'NH'  => 'numeric|between:0,100',
            'UTS' => 'numeric|between:0,100',
            'UAS' => 'numeric|between:0,100',
            'NPr' => 'numeric|between:0,100',
            'NPj' => 'numeric|between:0,100',
            'NPo' => 'numeric|between:0,100',

        ];
    }

}
