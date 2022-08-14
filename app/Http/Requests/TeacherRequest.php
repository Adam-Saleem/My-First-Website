<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    use function Symfony\Component\Translation\t;

    class TeacherRequest extends FormRequest
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
                'name' => 'required|unique:teachers',
                'birth_date' => 'required|date|date_format:Y-m-d|before:'.now()->subYears(18)->toDateString()
            ];
        }

        public function attributes()
        {
            return [
                'name' => 'teacher name'
            ];
        }

        public function messages()
        {
            return [
                'birth_date.before' => 'Age must be more than 18 year'
            ];
        }
    }
