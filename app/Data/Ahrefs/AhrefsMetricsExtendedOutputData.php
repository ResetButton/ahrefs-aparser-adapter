<?php

namespace App\Data\Ahrefs;

use App\Data\Aparser\AparserAhrefsBacklinkCheckerOutputData;
use App\Helpers\DatetimeHelper;
use App\Support\AparserAhrefsBacklinkCheckerBacklinks\AparserAhrefsBacklinkCheckerBacklinksCollection;
use App\Support\AparserAhrefsBacklinkCheckerBacklinks\AparserAhrefsBacklinkCheckerBacklinksData;

readonly class AhrefsMetricsExtendedOutputData implements AhrefsOutputData
{
    public function __construct(
        public int $refDomains,
        public int $backlinks,
    ){}

    public function toAhrefsApiResponse(): array
    {
        return [
            'metrics' => [
                'backlinks' => $this->backlinks,
                'refpages' => $this->refDomains,
                'pages' => 0,
                'valid_pages' => 0,
                'text' => 0,
                'image' => 0,
                'nofollow' => 0,
                'dofollow' => 0,
                'redirect' => 0,
                'canonical' => 0,
                'alternate' => 0,
                'gov' => 0,
                'edu' => 0,
                'rss' => 0,
                'html_pages' => 0,
                'links_internal' => 0,
                'links_external' => 0,
                'refdomains' => $this->refDomains,
                'refclass_c' => 0,
                'refips' => 0,
                'linked_root_domains' => $this->refDomains,
            ]
        ];
    }

    public static function fromAparserAhrefsBacklinkCheckerOutputData(AparserAhrefsBacklinkCheckerOutputData $data): static
    {
        return new static(
            refDomains: $data->refDomains,
            backlinks: $data->backlinks,
        );
    }

}
