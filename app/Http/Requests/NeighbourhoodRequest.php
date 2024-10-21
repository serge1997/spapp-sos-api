<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\Enums\CountryLocalInfoOriginEnum;
use Illuminate\Validation\Rule;

class NeighbourhoodRequest extends FormRequest
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
            'id'                => ['nullable'],
            'name'              => ['required', 'string'],
            'municipality_id'   => ['required', 'integer'],
            'longitude'         => ['nullable'],
            'latitude'          => ['nullable'],
            'origin'            => [Rule::enum(CountryLocalInfoOriginEnum::class)]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=> 'nom du quartier est obligatoire',
            'muncipality_id.required' => 'la commune est obligatoire',
            'municipality_id.integer' => 'la commune est incorrecte'
        ];
    }

    public function name() : ?string
    {
        return $this->name;
    }
    public function municipalityId() : ?int
    {
        return $this->municipality_id;
    }
}
