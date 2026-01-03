<?php

namespace App\Actions;

use App\Data\Ahrefs\AhrefsRefdomainsInputData;
use App\Data\Ahrefs\AhrefsDomainRatingOutputData;
use App\Data\Ahrefs\AhrefsRefdomainsOutputData;
use App\Data\Aparser\AparserAhrefsBacklinkCheckerInputData;

class AhrefsRefdomainsAction extends AhrefsAction
{

    public function execute(AhrefsRefdomainsInputData $data): AhrefsRefdomainsOutputData
    {
        $serviceData = AparserAhrefsBacklinkCheckerInputData::fromAhrefsRefdomainsInputData($data);
        $result = $this->aparserService->parseAhrefsBacklinkChecker($serviceData);

        return AhrefsRefdomainsOutputData::fromAparserAhrefsBacklinkCheckerOutputData($result);
    }
}
