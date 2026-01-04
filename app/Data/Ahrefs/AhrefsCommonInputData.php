<?php

namespace App\Data\Ahrefs;

use App\Enums\AhrefsMode;
use App\Http\Requests\AhrefsRequest;

readonly class AhrefsCommonInputData implements AhrefsInputData
{
    public function __construct(
        public string     $target,
        public AhrefsMode $mode,
        public int        $limit = 1000
    ){}

    public static function fromRequest(AhrefsRequest $request): static
    {
        return new static(
            target: $request->validated('target'),
            mode: AhrefsMode::from($request->validated('mode')),
            limit: $request->validated('limit') ?? 1000
        );
    }
}
