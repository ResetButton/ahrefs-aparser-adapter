<?php

namespace App\Actions;

use App\Data\Ahrefs\AhrefsDomainRatingInputData;
use App\Data\Ahrefs\AhrefsDomainRatingOutputData;
use App\Data\Aparser\AparserAhrefsBacklinkCheckerInputData;
use App\Services\AparserService;

class AhrefsDomainRatingAction
{
    public function __construct(readonly AparserService $aparserService)
    {}

    public function execute(AhrefsDomainRatingInputData $data): AhrefsDomainRatingOutputData
    {
        $serviceData = AparserAhrefsBacklinkCheckerInputData::fromAhrefsDomainRatingInputData($data);
        $result = $this->aparserService->parseAhrefsBacklinkChecker($serviceData);

        return new AhrefsDomainRatingOutputData($result->domainRating);
    }
}
