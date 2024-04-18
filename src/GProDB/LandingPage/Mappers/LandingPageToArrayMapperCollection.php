<?php

declare(strict_types=1);

namespace GProDB\LandingPage\Mappers;

use Sushi\ObjectCollection;

class LandingPageToArrayMapperCollection extends ObjectCollection
{
    protected static string $type = LandingPageToArrayMapper::class;
}
