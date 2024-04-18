<?php

declare(strict_types=1);

namespace GProDB\LandingPage\Mappers;

use GProDB\LandingPage\LandingPage;

interface ArrayToLandingPageMapper
{
    public function satisfies(LandingPageMapperEnum $sourceType): bool;
    public function map(array $json): LandingPage;
}
