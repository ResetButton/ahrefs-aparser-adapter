<?php

namespace App\Actions;

use ResetButton\AparserPhpClient\Aparser;

class AhrefsDomainRatingAction
{
    const TASK_PRESET = 'ahrefs_domain_rating';

    public function __construct(readonly Aparser $aparser)
    {}

    public function execute(string $domain) : string
    {
        return $domain;
    }
}
