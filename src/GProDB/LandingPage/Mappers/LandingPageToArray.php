<?php

declare(strict_types=1);

namespace GProDB\LandingPage\Mappers;

use GProDB\LandingPage\LandingPage;
use RuntimeException;

class LandingPageToArray
{
    public function __construct(
        private readonly LandingPageToArrayMapperCollection $mappers,
    ) {
    }

    public function map(LandingPage $landingPage, LandingPageMapperEnum $destinationType): array
    {
        $mapper = $this->getMapperFor($destinationType);

        return $mapper->map($landingPage);
    }

    private function getMapperFor(LandingPageMapperEnum $destinationType): LandingPageToArrayMapper
    {
        foreach ($this->mappers as $mapper) {
            if ($mapper->satisfies($destinationType)) {
                return $mapper;
            }
        }

        throw new RuntimeException('No mapper found for destination type');
    }
}
