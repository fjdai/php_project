<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'nullable|string|max:15|regex:/^\+?[0-9]{7,15}$/',
            'date_of_birth' => 'nullable|date|before:today',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'required|string|in:male,female,other',
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages(): array
    {
        return [
            'full_name.required' => 'Full name cannot be empty.',
            'email.required' => 'Email cannot be empty.',
            'email.email' => 'Invalid email format.',
            'email.unique' => 'This email has already been used.',
            'phone_number.regex' => 'Invalid phone number format. It must be 7-15 digits and may start with "+".',
            'date_of_birth.date' => 'Invalid date of birth.',
            'date_of_birth.before' => 'Date of birth must be in the past.',
            'avatar.image' => 'Avatar must be an image file.',
            'avatar.mimes' => 'Avatar must be in jpeg, png, jpg, or gif format.',
            'avatar.max' => 'Avatar file size must not exceed 2MB.',
            'gender.required' => 'Gender cannot be empty.',
            'gender.in' => 'Gender must be male, female, or other.',
        ];
    }
}
