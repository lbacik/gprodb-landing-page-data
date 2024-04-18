<?php

declare(strict_types=1);

namespace GProDB\LandingPage\Mappers;

use Sushi\ObjectCollection;

class ArrayToLandingPageMapperCollection extends ObjectCollection
{
    protected static string $type = ArrayToLandingPageMapper::class;
}
