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
            'country' => ['required','regex:/^[\w\. -]{3,50}$/'],
            'city' => ['required','regex:/^[\w\. -]{3,50}$/'],
            'date' => ['required','string','max:40'],
            'cost' => ['required','integer','numeric'],
            'description' => ['required','string','max:100'],
            '5km' => ['nullable','string','max:40'],
            '10km' => ['nullable','string','max:40'],
            '21km' => ['nullable','string','max:40'],
            '42km' => ['nullable','string','max:40'],
        ];
    }
}
