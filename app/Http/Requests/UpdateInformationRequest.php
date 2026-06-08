<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInformationRequest extends FormRequest
{
    protected $errorBag = 'updateProfile';

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
            'name' => 'required|string|max:255',
            'email_contact' => 'required|email|max:255',
            'phone_contact' => 'required|string|max:20',
            'github_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'description' => 'nullable|string',
            'role' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'available_for_work' => 'nullable|boolean',
        ];
    }
}
