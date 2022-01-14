<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RunnerRegRequest extends FormRequest
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
    public static function rules()
    {
        return [
            'country' => ['required','string','max:50'],
            'gender' => ['required', Rule::in([Gender::MALE, Gender::FEMALE])],
            'date_of_birthday' => ['required','date']
        ];
    }
}
