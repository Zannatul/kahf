<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name'     => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email',
            'phone_number'  => 'required|string|max:15|unique:users,phone_number',
            'date_of_birth' => 'required|date|before:today',
            'gender'        => 'required|in:male,female,other',
            'national_id'   => 'required|unique:users,national_id',
            'center_id'     => 'required',
            'password'      => 'required|string|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'The email address has already been taken.',
            'phone_number.unique' => 'The phone number has already been registered.',
            'date_of_birth.before' => 'The date of birth must be a date before today.',
        ];
    }
}
