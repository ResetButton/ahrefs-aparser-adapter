<?php

namespace App\Http\Requests;

use App\Enums\AhrefsFromEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AhrefsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'from' => ['required'],
        ];
    }
}
