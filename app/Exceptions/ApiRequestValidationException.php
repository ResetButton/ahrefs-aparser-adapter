<?php

namespace App\Exceptions;

use Illuminate\Contracts\Validation\Validator;

class ApiRequestValidationException extends \Exception
{
    public function __construct(readonly Validator $validator)
    {}
}
