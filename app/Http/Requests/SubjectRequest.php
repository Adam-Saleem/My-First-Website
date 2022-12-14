<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubjectRequest extends FormRequest
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
        if ($this->method() == 'PATCH' or $this->method() == 'PUT'){
            $subject = $this->route('subject');
            return [
                'name' => ['required',Rule::unique('subjects')->ignore($subject->id)],
                'description' => 'required'
            ];
        }
        return [
            'name' => 'required|unique:subjects',
            'description' => 'required'
        ];
    }
}
