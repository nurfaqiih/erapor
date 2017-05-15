<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateSectionRequest extends Request {

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
            'rombel_id'  => 'required|not_in:0',
            'teacher_id' => 'required|not_in:0',
            'course_id'  => 'required|not_in:0',
            'year'       => 'required',
            'kode'       => 'required'
        ];
    }

}
