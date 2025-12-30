<?php

namespace App\Data\Ahrefs;

use App\Enums\AhrefsDomainRatingMode;
use App\Http\Requests\AhrefsRequest;

class AhrefsDomainRatingOutputData
{
    public function __construct(
        readonly float $domainRating = 0
    ){}

    public function toArray(): array
    {
        return [
            "domain" => [
                "domain_rating" => $this->domainRating,
                "ahrefs_top" => 0
            ]
        ];
    }
}
