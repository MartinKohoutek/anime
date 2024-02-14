<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateRequest extends FormRequest
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
            'name' => 'required|max:100',
            'username' => 'required|max:50|unique:users,username,' . Auth::user()->id,
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'phone' => 'phone:INTERNATIONAL,CZ',
            'address' => 'max:100',
            'photo' => 'image|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'phone.phone' => 'Valid Phone Number Required',
        ];
    }
}
