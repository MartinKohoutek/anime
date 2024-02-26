<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostUpdateRequest extends FormRequest
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
            'title' => 'required|max:100|unique:blog_posts,title, ' . $this->post,
            'image' => 'nullable|image|max:3000',
            'category' => 'required',
            'status' => 'required',
            'description' => 'required',
            'seo_title' => 'max:255',
            'seo_description' => 'max:255',
        ];
    }
}
