<?php

namespace App\Http\Controllers;

use App\Actions\Ahrefs\GetSubscriptionAction;
use App\Enums\AhrefsFromEnum;

use Illuminate\Http\Request;

class AhrefsController extends Controller
{
    public function __invoke(Request $request)
    {
        $from = $request->input('from');
        $fromTable = AhrefsFromEnum::tryFrom($from);

        if ($fromTable === null) {
            return response()->json(["error" => "from: table '".$from."' not found or not implemented"], 404);
        }

        $result = match ($fromTable) {
            AhrefsFromEnum::SUBSCRIPTION_INFO => (new GetSubscriptionAction())->execute(),
        };

        return response()->json($result);
    }
}
