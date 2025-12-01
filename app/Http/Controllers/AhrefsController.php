<?php

namespace App\Http\Controllers;

/*
use App\Actions\Ahrefs\GetSubscriptionAction;
use App\Enums\AhrefsFromEnum;
*
 *
 */


use App\Actions\AhrefsSubscriptionInfoAction;
use App\Enums\AhrefsFromEnum;
use App\Http\Responses\ApiResponse;
use Illuminate\Http\Request;

class AhrefsController extends Controller
{
    public function __invoke(Request $request)
    {
        $endpoint = $request->input('from');
        $supportedEndpoint = AhrefsFromEnum::tryFrom($endpoint);

        if ($supportedEndpoint === null) {
            return ApiResponse::notFound("from: table '".$endpoint."' not found or not implemented");
        }

        $result = match ($supportedEndpoint) {
            AhrefsFromEnum::SUBSCRIPTION_INFO => (new AhrefsSubscriptionInfoAction())->execute(),
        };

        return ApiResponse::ok($result);
    }
}
