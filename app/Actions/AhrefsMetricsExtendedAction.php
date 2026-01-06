<?php

namespace App\Actions;

use App\Data\Ahrefs\AhrefsCommonInputData;
use App\Data\Ahrefs\AhrefsDomainRatingOutputData;
use App\Data\Ahrefs\AhrefsMetricsExtendedOutputData;
use App\Data\Ahrefs\AhrefsRefdomainsOutputData;
use App\Data\Aparser\AparserAhrefsBacklinkCheckerInputData;

class AhrefsMetricsExtendedAction extends AhrefsAction
{

    public function execute(AhrefsCommonInputData $data): AhrefsMetricsExtendedOutputData
    {
        $serviceData = AparserAhrefsBacklinkCheckerInputData::fromAhrefsCommonInputData($data);
        $result = $this->aparserService->parseAhrefsBacklinkChecker($serviceData);

        return AhrefsMetricsExtendedOutputData::fromAparserAhrefsBacklinkCheckerOutputData($result);
    }
}
