<?php

namespace App\Services;

use App\Data\Ahrefs\AhrefsDomainRatingInputData;
use App\Data\Aparser\AparserAhrefsBacklinkCheckerInputData;
use App\Data\Aparser\AparserAhrefsBacklinkCheckerOutputData;
use App\Data\Aparser\AparserAhrefsInputData;
use Illuminate\Support\Arr;
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
        $resultFormat = '[%
                result = {};
                result.domain_rating = rating;
                result.url_rating = url_rating;
                result.backlink_count = bl;
                result.backlink_dofollow_persentage = bl_dofollow;
                result.domains_count = domains;
                result.domains_dofollow_persentage = domains_dofollow;
                result.topbacklinks = backlinks;
            %]$result.json';

        $parser = (new Parser('Rank::Ahrefs', 'ahrefs_api_emulate'))
            ->addOverride('formatresult', preg_replace('/\r|\n|\r\n/', '', $resultFormat));
        $action = new OneRequestAction($parser, $data->target);

        $result = $this->runOneRequestAction($action, $data);
        $result["topbacklinks"] = Arr::take($result["topbacklinks"], $data->limit);

        return AparserAhrefsBacklinkCheckerOutputData::fromAparserResult($result);
    }

    private function runOneRequestAction(OneRequestAction $action, AparserAhrefsInputData $data): array
    {
        return Cache::remember($data->cacheName(), config('cache.cache_time_seconds'), function () use ($action) {
            $aparserResult = json_decode(data_get($this->aparser->runAction($action), 'resultString'), true);
            //todo if no result
            return $aparserResult;
        });
    }
}
