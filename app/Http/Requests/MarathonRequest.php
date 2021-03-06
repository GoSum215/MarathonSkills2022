<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarathonRequest extends FormRequest
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
            'marathon_name' => ['required','unique:marathons','string','max:40'],
            'country' => ['required','string','max:50'],
            'city' => ['required','string','max:50'],
            'date' => ['required','date'],
            'cost' => ['required','integer','numeric'],
            'description' => ['required','string','max:250'],
            '5km' => ['nullable','string','max:40'],
            '10km' => ['nullable','string','max:40'],
            '21km' => ['nullable','string','max:40'],
            '42km' => ['nullable','string','max:40'],
            'time5' => ['nullable','required_with:5km'],
            'time10' => ['nullable','required_with:10km'],
            'time21' => ['nullable','required_with:21km'],
            'time42' => ['nullable','required_with:42km'],
        ];
    }
}
