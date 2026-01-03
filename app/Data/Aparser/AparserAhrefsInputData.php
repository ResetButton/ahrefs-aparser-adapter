<?php

namespace App\Data\Aparser;

use App\Data\Ahrefs\AhrefsDomainRatingInputData;
use App\Enums\AhrefsMode;

interface AparserAhrefsInputData
{

    public function cacheName(): string;

}
