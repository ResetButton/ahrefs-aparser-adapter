<?php

namespace App\Data\Aparser;

use App\Data\Ahrefs\AhrefsDomainRatingInputData;
use App\Enums\AhrefsDomainRatingMode;

class AparserAhrefsBacklinkCheckerInputData
{
    public function __construct(
        readonly string $target,
        readonly AhrefsDomainRatingMode $mode,
        int $limit = 1000
    ){}

    public static function fromAhrefsDomainRatingInputData(AhrefsDomainRatingInputData $data): static
    {
        return new static(
            target: $data->target,
            mode: $data->mode,
        );
    }
}
