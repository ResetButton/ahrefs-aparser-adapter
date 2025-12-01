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
use App\Enums\AhrefsFromEnum;
use App\Http\Requests\AhrefsRequest;
use App\Http\Responses\ApiResponse;
use ResetButton\AparserPhpClient\Aparser;

class AhrefsController extends Controller
{
    public function __invoke(AhrefsRequest $request, Aparser $aparser)
    {
        $endpoint = $request->input('from');
        $supportedEndpoint = AhrefsFromEnum::tryFrom($endpoint);

        $result = match ($supportedEndpoint) {
            AhrefsFromEnum::SUBSCRIPTION_INFO => (new AhrefsSubscriptionInfoAction())->execute(),
            AhrefsFromEnum::DOMAIN_RATING => (new AhrefsDomainRatingAction($aparser))->execute(),
        };

        return ApiResponse::ok($result);
    }
}
