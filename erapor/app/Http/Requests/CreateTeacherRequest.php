<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateTeacherRequest extends Request {

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
            'nip'         => 'numeric|required|unique:users,username',
            'course_id'   => 'required',
            'gender'      => 'in:1,2',
        ];
    }

}
