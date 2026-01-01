<?php

namespace App\Data\Aparser;

use App\Data\Ahrefs\AhrefsAnchorsInputData;
use App\Data\Ahrefs\AhrefsDomainRatingInputData;
use App\Enums\AhrefsDomainRatingMode;

readonly class AparserAhrefsBacklinkCheckerInputData implements AparserAhrefsInputData
{
    public function __construct(
        public string                 $target,
        public AhrefsDomainRatingMode $mode,
    ){}

    public function cacheName(): string
    {
        return  'Rank::Ahrefs_'.$this->mode->value.'_'.base64_encode($this->target);
    }

    public static function fromAhrefsDomainRatingInputData(AhrefsDomainRatingInputData $data): static
    {
        return new static(
            target: $data->target,
            mode: AhrefsDomainRatingMode::SUBDOMAINS
        );
    }

    public static function fromAhrefsAnchorsInputData(AhrefsAnchorsInputData $data): static
    {
        return new static(
            target: $data->target,
            mode: $data->mode,
        );
    }


}
