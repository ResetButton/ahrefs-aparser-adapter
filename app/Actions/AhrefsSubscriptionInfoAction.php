<?php

namespace App\Actions;

use App\Data\Ahrefs\AhrefsSubscriptionInfoOutputData;

class AhrefsSubscriptionInfoAction
{
    public function execute()
    {
        return new AhrefsSubscriptionInfoOutputData();
    }
}
