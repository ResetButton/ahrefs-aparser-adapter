<?php

namespace App\Data\Ahrefs;

use App\Data\Aparser\AparserAhrefsBacklinkCheckerOutputData;
use App\Helpers\DatetimeHelper;
use App\Support\AparserAhrefsBacklinkCheckerBacklinks\AparserAhrefsBacklinkCheckerBacklinksCollection;
use App\Support\AparserAhrefsBacklinkCheckerBacklinks\AparserAhrefsBacklinkCheckerBacklinksData;

readonly class AhrefsRefdomainsOutputData implements AhrefsOutputData
{
    public function __construct(
        public AparserAhrefsBacklinkCheckerBacklinksCollection $topBacklinks,
        public float $refDomains = 0,
    ){}

    public function toAhrefsApiResponse(): array
    {
        $refDomains = [];
        /* @var AparserAhrefsBacklinkCheckerBacklinksData $topBacklink */
        foreach ($this->topBacklinks as $topBacklink) {
            $refDomains[] = [
                'refdomain' => parse_url($topBacklink->page, PHP_URL_HOST),
                'backlinks' => 0,
                'refpages' => 0,
                "first_seen" => DatetimeHelper::fakeDatetime(),
                "last_visited" => DatetimeHelper::fakeDatetime(),
                'domain_rating' => $topBacklink->domainRating,
            ];
        }

        return [
            "refdomains" => $refDomains,
            "stats" => [
                "refdomains" => $this->refDomains,
                "ips" => 0,
                "class_c" => 0
            ]
        ];
    }

    public static function fromAparserAhrefsBacklinkCheckerOutputData(AparserAhrefsBacklinkCheckerOutputData $data): static
    {
        return new static(
            topBacklinks: $data->topBacklinks,
            refDomains: $data->refDomains
        );
    }

}
