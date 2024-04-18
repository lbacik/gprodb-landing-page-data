<?php

declare(strict_types=1);

namespace GProDB\LandingPage\Mappers;

use GProDB\LandingPage\LandingPage;

interface LandingPageToArrayMapper
{
    public function satisfies(LandingPageMapperEnum $destinationType): bool;
    public function map(LandingPage $landingPage): array;
}
