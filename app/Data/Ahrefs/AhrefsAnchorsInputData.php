<?php

namespace App\Data\Ahrefs;

use App\Enums\AhrefsDomainRatingMode;
use App\Http\Requests\AhrefsRequest;

readonly class AhrefsAnchorsInputData implements AhrefsInputData
{
    public function __construct(
        public string                 $target,
        public AhrefsDomainRatingMode $mode,
        public int $limit = 1000
    ){}

    public static function fromRequest(AhrefsRequest $request): static
    {
        return new static(
            target: $request->validated('target'),
            mode: AhrefsDomainRatingMode::from($request->validated('mode')),
            limit: $request->validated('limit') ?? 1000
        );
    }
}
