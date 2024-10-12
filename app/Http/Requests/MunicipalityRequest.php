<?php

namespace App\Http\Requests;

use App\Enums\Enums\CountryLocalInfoOriginEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MunicipalityRequest extends FormRequest
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
            'id'        => ['nullable'],
            'name'      => ['required', 'string'],
            'city_id'   => ['required', 'integer'],
            'longitude' => ['nullable'],
            'latitude'  => ['nullable'],
            'origin'    => [Rule::enum(CountryLocalInfoOriginEnum::class)]
        ];
    }

    public function messages(): array
    {
        return [

        ];
    }

    public function name() : ?string
    {
        return $this->name;
    }

    public function cityId() : ?int
    {
        return $this->city_id;
    }

    public function longitude()
    {
        return $this->longitude;
    }

    public function latitude()
    {
        return $this->latitude;
    }

    public function origin() : string
    {
        return $this->origin;
    }
}
