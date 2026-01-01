<?php

namespace App\Data\Aparser;

use App\Data\Ahrefs\AhrefsDomainRatingInputData;
use App\Enums\AhrefsDomainRatingMode;

interface AparserAhrefsOutputData
{

    public static function fromAparserResult(array $data): static;

}
