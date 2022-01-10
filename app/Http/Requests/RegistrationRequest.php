<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationRequest extends FormRequest
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
            'login' => 'required|unique:users|between:5, 30|regex:/^[a-z0-9_-]+$/i',
            'password' => 'required|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*.,])[0-9a-zA-Z!@#$%^&*.,]{5,30}/',
            'surname' => 'required|regex:/^[\w\. -]{5,50}$/',
            'name' => 'required|regex:/^[\w\. -]{5,30}$/',
            'gender' => ['required', Rule::in([Gender::MALE, Gender::FEMALE])],
            'email' => 'nullable|unique:users|string|max:100|regex:/^[^@]+(@)[^.@]+(.)[^.@]+$/',
        ];
    }
}
