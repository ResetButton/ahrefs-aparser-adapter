<?php

namespace App\Data\Ahrefs;

use App\Data\Aparser\AparserAhrefsBacklinkCheckerOutputData;
use App\Enums\AhrefsMode;
use App\Http\Requests\AhrefsRequest;

readonly class AhrefsRefdomainsOutputData implements AhrefsOutputData
{
    public function __construct(
        public float $refDomains = 0
    ){}

    public function toAhrefsApiResponse(): array
    {
        return [
            "refdomains" => [],
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
            refDomains: $data->refDomains
        );
    }

}
