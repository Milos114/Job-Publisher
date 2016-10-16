<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JobsCreateRequest extends Request
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
            'description' => 'required',
            'title' => 'required',
            'email' => 'required|email|unique:jobs',
        ];
    }

    /**
     * Get the validator instance for the request and
     * add attach callbacks to be run after validation
     * is completed.
     */
//    protected function getValidatorInstance()
//    {
//        return parent::getValidatorInstance()->after(function ($validator) {
//            $this->after($validator);
//        });
//    }

    /**
     * Attach callbacks to be run after validation is completed.
     *
     * @param $validator
     */
//    public function after($validator)
//    {
//        if (auth()->user()->jobPending()) {
//            $validator->errors()->add('pending', 'You will have to wait for admin approval regarding your previous submission');
//        }
//    }
}
