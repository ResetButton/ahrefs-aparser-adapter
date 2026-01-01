<?php

namespace App\Services;

use App\Data\Ahrefs\AhrefsDomainRatingInputData;
use App\Data\Aparser\AparserAhrefsBacklinkCheckerInputData;
use App\Data\Aparser\AparserAhrefsBacklinkCheckerOutputData;
use App\Data\Aparser\AparserAhrefsInputData;
use Illuminate\Support\Facades\Cache;
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
        $action = (new OneRequestAction($parser, $data->target))
            ->setRawResults();

        $result = $this->runOneRequestAction($action, $data);

        return AparserAhrefsBacklinkCheckerOutputData::fromAparserResult($result);
    }

    private function runOneRequestAction(OneRequestAction $action, AparserAhrefsInputData $data): array
    {
        return Cache::remember($data->cacheName(), config('cache.cache_time_seconds'), function () use ($action) {
            $aparserResult = data_get($this->aparser->runAction($action), 'results.0');
            //todo if no result
            return $aparserResult;
        });
    }
}
