<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateStudentRequest extends Request {

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
            'thumbnail'   => 'required|image|max:3000',
            'nis'         => 'required|numeric',
            'bp'          => 'required|integer',
            'name'        => 'required|string',
            'gender'      => 'in:1,2',
            'birth_place' => 'string'
        ];
    }

}
