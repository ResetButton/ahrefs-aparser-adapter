<?php

namespace App\Actions;

class AhrefsSubscriptionInfoAction
{
    public function execute()
    {
        return [
            "info" => [
                "rows_left" => 500000,
                "rows_limit" => 500000,
                "subscription" => "Enterprise Subscription"
            ]
        ];
    }
}
