<?php

namespace App\Http\Controllers;

/*
use App\Actions\Ahrefs\GetSubscriptionAction;
use App\Enums\AhrefsFromEnum;
*
 *
 */


use App\Actions\AhrefsMetricsExtendedAction;
use App\Actions\AhrefsRefdomainsAction;
use App\Actions\AhrefsDomainRatingAction;
use App\Actions\AhrefsSubscriptionInfoAction;
use App\Data\Ahrefs\AhrefsCommonInputData;
use App\Data\Ahrefs\AhrefsDomainRatingInputData;
use App\Data\Ahrefs\AhrefsOutputData;
use App\Enums\AhrefsFromEnum;
use App\Http\Requests\AhrefsRequest;
use App\Http\Responses\ApiResponse;
use App\Services\AparserService;
use ResetButton\AparserPhpClient\Actions\PingAction;

class HealthCheckController extends Controller
{
    public function __invoke(AparserService $aparserService)
    {
        try {
            $aparserService->healthCheck();
        } catch (\Throwable $e) {
            ApiResponse::fromException($e);
        }

        ApiResponse::ok(['data' => ['healthcheck' => 'OK']]);
    }
}
