<?php

namespace App\Actions;

use App\Data\Ahrefs\AhrefsCommonInputData;
use App\Data\Ahrefs\AhrefsDomainRatingOutputData;
use App\Data\Ahrefs\AhrefsRefdomainsOutputData;
use App\Data\Aparser\AparserAhrefsBacklinkCheckerInputData;

class AhrefsRefdomainsAction extends AhrefsAction
{

    public function execute(AhrefsCommonInputData $data): AhrefsRefdomainsOutputData
    {
        $serviceData = AparserAhrefsBacklinkCheckerInputData::fromAhrefsCommonInputData($data);
        $result = $this->aparserService->parseAhrefsBacklinkChecker($serviceData);

        return AhrefsRefdomainsOutputData::fromAparserAhrefsBacklinkCheckerOutputData($result);
    }
}
