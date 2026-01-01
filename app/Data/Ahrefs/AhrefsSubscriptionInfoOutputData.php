<?php

namespace App\Data\Ahrefs;

readonly class AhrefsSubscriptionInfoOutputData implements AhrefsOutputData
{
    public function toAhrefsApiResponse(): array
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
