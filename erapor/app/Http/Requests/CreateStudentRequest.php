<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateStudentRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (\Auth::user()->role != 2)
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
            'thumbnail'   => 'image|max:3000',
            'nis'         => 'required|unique:users,username|numeric',
            'name'        => 'required|min:4',
            'gender'      => 'required|in:1,2',
            'birth'       => 'required',
            'birth_place' => 'required',
            'bp'          => 'numeric'
        ];
    }

}
