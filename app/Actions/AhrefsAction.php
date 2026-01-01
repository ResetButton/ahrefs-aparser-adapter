<?php

namespace App\Actions;

use App\Data\Ahrefs\AhrefsDomainRatingInputData;
use App\Data\Ahrefs\AhrefsDomainRatingOutputData;
use App\Data\Ahrefs\AhrefsOutputData;
use App\Data\Aparser\AparserAhrefsBacklinkCheckerInputData;
use App\Services\AparserService;

abstract class AhrefsAction
{
    public function __construct(readonly AparserService $aparserService)
    {}

}
