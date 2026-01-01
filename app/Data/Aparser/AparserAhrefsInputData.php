<?php

namespace App\Data\Aparser;

use App\Data\Ahrefs\AhrefsDomainRatingInputData;
use App\Enums\AhrefsDomainRatingMode;

interface AparserAhrefsInputData
{

    public function cacheName(): string;

}
