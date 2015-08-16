<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TagRequest extends Request
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
        $rules = [
            'title' => 'required',
            'subtitle' => 'required',
            'layout' => 'required',
        ];

        // Check if we are creating a tag using method POST - method PUT is for updating
        if ($this->method() === 'POST') {
            $rules['tag'] = 'required|unique:tags,tag'; // Add tag rule
        }

        return $rules;
    }
}
