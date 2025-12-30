<?php

namespace App\Http\Requests;

use App\Enums\AhrefsDomainRatingMode;
use App\Enums\AhrefsFromEnum;
use App\Http\Responses\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class AhrefsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        //attach validation rules
        $extraValidationRules = match ($this->input('from')) {
            'domain_rating' => $this->getDomainRatingValidationRules(),
             default => []
        };


        return [
            'from' => ['required', Rule::enum(AhrefsFromEnum::class)],
            ...$extraValidationRules
        ];
    }

    public function messages(): array
    {
        return [
            'from' => "from: table :from not found or not implemented111"
        ];
    }

    private function getDomainRatingValidationRules()
    {
        return [
            'target' => ['required'],
            'mode' => [Rule::enum(AhrefsDomainRatingMode::class)],
            'limit' => ['integer', 'min:1'],
        ];
    }



    /*
    protected function failedValidation(Validator $validator)
    {
        return response()->json(['errors' => $validator->errors()], 422);
        //return ApiResponse::errorUnprocessableEntity(implode(', ', $validator->errors()->all()));
    }
    */

}
