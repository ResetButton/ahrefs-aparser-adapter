<?php

namespace App\Actions;

use App\Data\Ahrefs\AhrefsSubscriptionInfoOutputData;

class AhrefsSubscriptionInfoAction extends AhrefsAction
{
    public function execute()
    {
        return new AhrefsSubscriptionInfoOutputData();
    }
}
