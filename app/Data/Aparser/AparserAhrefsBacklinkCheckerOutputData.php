<?php

namespace App\Data\Aparser;

readonly class AparserAhrefsBacklinkCheckerOutputData implements AparserAhrefsOutputData
{
    public function __construct(
        public float $domainRating = 0
    ){}

    public static function fromAparserResult(array $data): static
    {
        return new static(
            domainRating: data_get($data, 'rating')
        );
    }
}
