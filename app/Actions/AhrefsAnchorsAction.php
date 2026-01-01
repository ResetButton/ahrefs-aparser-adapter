<?php

namespace App\Actions;

use App\Data\Ahrefs\AhrefsAnchorsInputData;
use App\Data\Ahrefs\AhrefsDomainRatingOutputData;
use App\Data\Aparser\AparserAhrefsBacklinkCheckerInputData;

class AhrefsAnchorsAction extends AhrefsAction
{

    public function execute(AhrefsAnchorsInputData $data): AhrefsDomainRatingOutputData
    {
        $serviceData = AparserAhrefsBacklinkCheckerInputData::fromAhrefsAnchorsInputData($data);
        $result = $this->aparserService->parseAhrefsBacklinkChecker($serviceData);

        return new AhrefsDomainRatingOutputData($result->domainRating);
    }
}
