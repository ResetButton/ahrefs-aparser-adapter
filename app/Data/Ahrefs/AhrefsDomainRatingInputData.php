<?php

namespace App\Data\Ahrefs;

use App\Enums\AhrefsDomainRatingMode;
use App\Http\Requests\AhrefsRequest;

class AhrefsDomainRatingInputData
{
    public function __construct(
        readonly string $target,
        readonly AhrefsDomainRatingMode $mode,
    ){}

    public static function fromRequest(AhrefsRequest $request): static
    {
        return new static(
            target: $request->validated('target'),
            mode: AhrefsDomainRatingMode::from($request->validated('mode')),
        );
    }
}
