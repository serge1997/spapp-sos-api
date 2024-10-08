<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantCreateRequest extends FormRequest
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
            'fullname'           => ['required','string'],
            'email'              => ['nullable'],
            'username'           => ['required'],
            'password'           => ['nullable'],
            'cni_number'         => ['nullable'],
            'attestation_number' => ['nullable'],
            'phone'              => ['required'],
            'address_id'         => ['nullable'],
            'address_number'     => ['nullable'],
            'address_complement' => ['nullable'],
        ];
    }
}
