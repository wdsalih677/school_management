<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
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
            'name_ar'  => 'required|unique:grades,name->ar,'.$this->id,
            'name_en'  => 'required|unique:grades,name->en,'.$this->id,
            'notes'    => 'required|unique:grades,notes,'.$this->id,
        ];
    }
    public function messages()
    {
        return [
            'name_ar.required'  => trans('main_trans.requied_gradeName_ar'),
            'name_en.required'  => trans('main_trans.requied_gradeName_en'),
            'notes.required'     => trans('main_trans.requied_gradeNotes'),

            'name_ar.unique'    => trans('main_trans.unique_gradeName_ar'),
            'name_en.unique'    => trans('main_trans.unique_gradeName_en'),
            'notes.unique'       => trans('main_trans.unique_gradeNotes'),
        ];
    }
}
