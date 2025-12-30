<?php

namespace App\Enums;

enum AhrefsDomainRatingMode: string
{
    case SUBDOMAINS = 'subdomains';
    case EXACT = 'exact';
}
