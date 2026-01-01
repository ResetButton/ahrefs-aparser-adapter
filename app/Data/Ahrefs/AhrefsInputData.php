<?php

namespace App\Data\Ahrefs;

use App\Http\Requests\AhrefsRequest;

interface AhrefsInputData
{
    public static function fromRequest(AhrefsRequest $request): static;
}
