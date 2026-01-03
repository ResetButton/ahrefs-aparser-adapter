<?php

namespace App\Http\Controllers;

/*
use App\Actions\Ahrefs\GetSubscriptionAction;
use App\Enums\AhrefsFromEnum;
*
 *
 */


use App\Actions\AhrefsRefdomainsAction;
use App\Actions\AhrefsDomainRatingAction;
use App\Actions\AhrefsSubscriptionInfoAction;
use App\Data\Ahrefs\AhrefsRefdomainsInputData;
use App\Data\Ahrefs\AhrefsDomainRatingInputData;
use App\Data\Ahrefs\AhrefsOutputData;
use App\Enums\AhrefsFromEnum;
use App\Http\Requests\AhrefsRequest;
use App\Http\Responses\ApiResponse;
use App\Services\AparserService;

class AhrefsController extends Controller
{
    public function __invoke(AhrefsRequest $request, AparserService $aparserService)
    {
        $endpoint = $request->input('from');
        $supportedEndpoint = AhrefsFromEnum::tryFrom($endpoint);

        /* @var AhrefsOutputData $result */
        $result = match ($supportedEndpoint) {
            AhrefsFromEnum::SUBSCRIPTION_INFO => (new AhrefsSubscriptionInfoAction($aparserService))->execute(),
            AhrefsFromEnum::DOMAIN_RATING => (new AhrefsDomainRatingAction($aparserService))->execute(AhrefsDomainRatingInputData::fromRequest($request)),
            AhrefsFromEnum::REFDOMAINS => (new AhrefsRefdomainsAction($aparserService))->execute(AhrefsRefdomainsInputData::fromRequest($request)),
        };

        return ApiResponse::ok($result->toAhrefsApiResponse());
    }
}
