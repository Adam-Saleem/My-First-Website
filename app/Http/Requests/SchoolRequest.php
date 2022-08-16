<?php

namespace App\Http\Requests;

use App\Models\School;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SchoolRequest extends FormRequest
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
            $school = $this->route('school');
            return [
                'name' => ['required',Rule::unique('schools')->ignore($school->id)],
                'address' => 'required'
            ];
        }
        return [
            'name' => 'required|unique:schools',
            'address' => 'required'
        ];
    }
}
