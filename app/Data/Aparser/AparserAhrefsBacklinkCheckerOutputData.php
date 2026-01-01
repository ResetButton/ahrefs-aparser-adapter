<?php

namespace App\Data\Aparser;

readonly class AparserAhrefsBacklinkCheckerOutputData implements AparserAhrefsOutputData
{
    public function __construct(
        public float $domainRating = 0,
        public int $refDomains = 0,
        public int $refDomainsDoFollowPersentage = 0,
        public int $backlinks = 0,
        public int $backlinksDoFollowPersentage = 0,


    ){}

    public static function fromAparserResult(array $data): static
    {


        return new static(
            domainRating: data_get($data, 'rating'),
            refDomains: data_get($data, 'domains'),
            refDomainsDoFollowPersentage: data_get($data, 'domains_dofollow'),
            backlinks: data_get($data, 'bl'),
            backlinksDoFollowPersentage: data_get($data, 'bl_dofollow'),
        );
    }
}
