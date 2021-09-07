<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'password' => ['required', 'string', 'min:3', 'max:12', 'confirmed'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['nullable', 'regex:/^09\d{9}$/', 'unique:users'],
            'country' => ['nullable', 'string', 'min:3', 'max:30'],
            'city' => ['required_with:country', 'string', 'min:2', 'max:30']
        ];
    }
}
