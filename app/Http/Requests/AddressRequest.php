<?php

namespace App\Http\Requests;

use App\Enums\Enums\CountryLocalInfoOriginEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddressRequest extends FormRequest
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
            'id'               => ['nullable'],
            'street_name'      => ['nullable'],
            'city'          => ['required'],
            'municipality'  => ['required'],
            'neighbourhood' => ['required'],
            'sector_id'        => ['nullable'],
            'zip_code'         => ['nullable'],
            'longitude' => ['nullable'],
            'latitude' => ['nullable'],
            'origin'        => [Rule::enum(CountryLocalInfoOriginEnum::class)]
        ];
    }
}
