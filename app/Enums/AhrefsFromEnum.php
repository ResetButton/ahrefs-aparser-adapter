<?php

namespace App\Enums;

enum AhrefsFromEnum: string
{
    case ANCHORS = 'anchors';
    case DOMAIN_RATING = 'domain_rating';
    case REFDOMAINS = 'refdomains';
    case METRICS_EXTENDED = 'metrics_extended';
    case SUBSCRIPTION_INFO = 'subscription_info';
}
