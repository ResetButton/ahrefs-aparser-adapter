<?php

namespace App\Http\Requests;

use App\Enums\AhrefsMode;
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
        $extraValidationRules = match ($this->input('from')) {
            'subscription_info' => [],
             default => $this->getCommonValidationRules(),
        };

        return [
            'from' => ['required', Rule::enum(AhrefsFromEnum::class)],
            ...$extraValidationRules
        ];
    }

    public function messages(): array
    {
        return [
            'from' => "from: table :from not found or not implemented"
        ];
    }

    private function getCommonValidationRules(): array
    {
        return [
            'target' => ['required'],
            'mode' => ['required', Rule::enum(AhrefsMode::class)],
            'limit' => ['integer', 'min:1'],
        ];
    }



    /*
     * todo
    protected function failedValidation(Validator $validator)
    {
        return response()->json(['errors' => $validator->errors()], 422);
        //return ApiResponse::errorUnprocessableEntity(implode(', ', $validator->errors()->all()));
    }
    */

}
