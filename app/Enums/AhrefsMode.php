<?php

namespace App\Enums;

enum AhrefsMode: string
{
    case SUBDOMAINS = 'subdomains';
    case EXACT = 'exact';
}
