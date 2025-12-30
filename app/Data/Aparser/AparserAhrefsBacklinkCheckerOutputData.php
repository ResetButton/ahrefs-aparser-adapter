<?php

namespace App\Data\Aparser;

class AparserAhrefsBacklinkCheckerOutputData
{
    public function __construct(
        readonly float $domainRating = 0
    ){}

    public static function fromArray(array $data): static
    {
        return new static(
            domainRating: data_get($data, 'domain_rating')
        );
    }
}
