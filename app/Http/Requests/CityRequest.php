<?php

namespace App\Http\Requests;

use App\Enums\Enums\CountryLocalInfoOriginEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityRequest extends FormRequest
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
            'region_id'    => ['required','integer'],
            'district'     => ['nullable'],
            'longitude'    => ['nullable'],
            'latitude'     => ['nullable'],
            'population'   => ['nullable'],
            'origin'       => [Rule::enum(CountryLocalInfoOriginEnum::class)]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'le nom de ville est obligatoire',
            'region_id.required' => 'la region est obligatoire',
            'region_id.integer' => 'type de donné de la region incorect'
        ];
    }

    public function name() : ?string
    {
        return $this->name;
    }

    public function region() : ?int
    {
        return $this->region_id;
    }
}
