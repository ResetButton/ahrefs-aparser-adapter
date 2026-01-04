<?php

namespace App\Actions;

use App\Data\Ahrefs\AhrefsCommonInputData;
use App\Data\Ahrefs\AhrefsDomainRatingInputData;
use App\Data\Ahrefs\AhrefsDomainRatingOutputData;
use App\Data\Aparser\AparserAhrefsBacklinkCheckerInputData;
use App\Services\AparserService;

class AhrefsDomainRatingAction extends AhrefsAction
{

    public function execute(AhrefsDomainRatingInputData $data): AhrefsDomainRatingOutputData
    {
        $serviceData = AparserAhrefsBacklinkCheckerInputData::fromAhrefsDomainRatingInputData($data);
        $result = $this->aparserService->parseAhrefsBacklinkChecker($serviceData);

        return AhrefsDomainRatingOutputData::fromAparserAhrefsBacklinkCheckerOutputData($result);
    }
}
