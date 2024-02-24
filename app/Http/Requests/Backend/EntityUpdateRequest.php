<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class EntityUpdateRequest extends FormRequest
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
            'name' => 'required|max:100|string',
            'category' => 'required',
            'thumbnail' => 'nullable|image|max:4096',
            'preview' => 'nullable|mimetypes:video/avi,video/mpeg,video/mp4,video/quicktime|max:102400',
            'status' => 'required',
        ];
    }
}
