<?php

namespace App\Data\Ahrefs;

use App\Enums\AhrefsDomainRatingMode;
use App\Http\Requests\AhrefsRequest;

readonly class AhrefsDomainRatingOutputData implements AhrefsOutputData
{
    public function __construct(
        public float $domainRating = 0
    ){}

    public function toAhrefsApiResponse(): array
    {
        return [
            "domain" => [
                "domain_rating" => $this->domainRating,
                "ahrefs_top" => 0
            ]
        ];
    }
}
