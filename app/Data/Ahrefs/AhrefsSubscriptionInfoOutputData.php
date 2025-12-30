<?php

namespace App\Data\Ahrefs;

class AhrefsSubscriptionInfoOutputData
{
    public function toArray(): array
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
