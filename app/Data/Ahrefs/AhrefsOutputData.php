<?php

namespace App\Data\Ahrefs;

use App\Http\Requests\AhrefsRequest;

interface AhrefsOutputData
{
    public function toAhrefsApiResponse(): array;
}
