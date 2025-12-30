<?php

namespace App\Http\Controllers;

/*
use App\Actions\Ahrefs\GetSubscriptionAction;
use App\Enums\AhrefsFromEnum;
*
 *
 */


use App\Actions\AhrefsDomainRatingAction;
use App\Actions\AhrefsSubscriptionInfoAction;
use App\Data\Ahrefs\AhrefsDomainRatingInputData;
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

        $result = match ($supportedEndpoint) {
            AhrefsFromEnum::SUBSCRIPTION_INFO => (new AhrefsSubscriptionInfoAction())->execute(),
            AhrefsFromEnum::DOMAIN_RATING => (new AhrefsDomainRatingAction($aparserService))->execute(AhrefsDomainRatingInputData::fromRequest($request)),
        };

        return ApiResponse::ok($result->toArray());
    }
}
