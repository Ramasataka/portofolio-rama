<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'description_thumbnail' => 'required|string',
            'key_feature' => 'required|string',
            'link_types' => 'nullable|array',
            'link_types.*' => 'nullable|string',
            'links' => 'nullable|array',
            'links.*' => 'nullable|url',
            'tech_stacks' => 'required|array',
            'tech_stacks.*' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'integer'
        ];
    }
}
