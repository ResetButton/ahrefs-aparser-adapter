<?php

namespace App\Data\Aparser;

use App\Data\Ahrefs\AhrefsRefdomainsInputData;
use App\Data\Ahrefs\AhrefsDomainRatingInputData;
use App\Enums\AhrefsMode;

readonly class AparserAhrefsBacklinkCheckerInputData implements AparserAhrefsInputData
{
    public function __construct(
        public string     $target,
        public AhrefsMode $mode,
        public int $limit = 1000,
    ){}

    public function cacheName(): string
    {
        return  'Rank::Ahrefs_'.$this->mode->value.'_'.base64_encode($this->target);
    }

    public static function fromAhrefsDomainRatingInputData(AhrefsDomainRatingInputData $data): static
    {
        return new static(
            target: $data->target,
            mode: AhrefsMode::SUBDOMAINS
        );
    }

    public static function fromAhrefsRefdomainsInputData(AhrefsRefdomainsInputData $data): static
    {
        return new static(
            target: $data->target,
            mode: $data->mode,
            limit: $data->limit
        );
    }


}
