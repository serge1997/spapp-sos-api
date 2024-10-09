<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegionRequest extends FormRequest
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
            'name'         => ['required', 'string'],
            'map_position' => ['nullable'],
            'longitude'    => ['nullable'],
            'latitude'     => ['nullable'],
            'population'   => ['nullable']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'le nom de region est obligatoire'
        ];
    }

    public function name()
    {
        return $this->name;
    }
}
