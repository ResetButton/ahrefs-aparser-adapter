<?php

namespace App\Services;

use App\Data\Ahrefs\AhrefsDomainRatingInputData;
use App\Data\Aparser\AparserAhrefsBacklinkCheckerInputData;
use App\Data\Aparser\AparserAhrefsBacklinkCheckerOutputData;
use ResetButton\AparserPhpClient\Actions\OneRequestAction;
use ResetButton\AparserPhpClient\Aparser;
use ResetButton\AparserPhpClient\Parser;

readonly class AparserService
{
    public function __construct(public Aparser $aparser)
    {}

    public function parseAhrefsBacklinkChecker(AparserAhrefsBacklinkCheckerInputData $data): AparserAhrefsBacklinkCheckerOutputData
    {
        $parser = new Parser('Rank::Ahrefs', 'ahrefs_api_emulate');
        $action = new OneRequestAction($parser, $data->target);

        $result = data_get($this->aparser->runAction($action), 'resultString', '{}');

        $json = json_decode($result, true);

        return AparserAhrefsBacklinkCheckerOutputData::fromArray($json);
    }
}
