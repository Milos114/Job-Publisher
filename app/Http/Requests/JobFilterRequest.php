<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JobFilterRequest extends Request
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
            'search' => 'regex:/^[^<>\'\"]+$/',
            'from' => 'date',
            'to' => 'date',
        ];
    }

    /**
     * Generate Custom messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'to.date' => 'Please enter valid date format',
            'from.date' => 'Please enter valid date format',
            'search.regex' => 'Characters <, >, ", \' are not allowed',
        ];
    }
}
