<?php

namespace App\Data\Aparser;

use ResetButton\AparserPhpClient\Actions\OneRequestAction;

class AparserAhrefsBacklinkCheckerBacklinksData
{
    public function __construct(
        readonly string $page = "",
        readonly string $anchor = "",
        readonly string $preAnchor = "",
        readonly string $postAnchor = "",
        readonly string $title = "",
        readonly int $domainRating = 0,
        readonly string $target = "",
        //redirects
        //redirect_code
    ) {}

    public static function fromArray(array $data): static
    {
        return new static (
            page: data_get($data, 'page', ""),
            anchor: data_get($data, 'anchor', ""),
            preAnchor: data_get($data, 'preAnchor', ""),
            postAnchor: data_get($data, 'postAnchor', ""),
            title: data_get($data, 'title', ""),
            domainRating: data_get($data, 'dr', ""),
            target: data_get($data, 'url', ""),
        );
    }
}
