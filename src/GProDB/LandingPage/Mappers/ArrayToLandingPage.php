<?php

declare(strict_types=1);

namespace GProDB\LandingPage\Mappers;

use GProDB\LandingPage\LandingPage;
use RuntimeException;

class ArrayToLandingPage
{
    public function __construct(
        private readonly ArrayToLandingPageMapperCollection $mappers
    ) {
    }

    public function map(array $json, LandingPageMapperEnum $mapper): LandingPage
    {
        $mapper = $this->getMapperFor($mapper);

        return $mapper->map($json);
    }

    private function getMapperFor(LandingPageMapperEnum $destinationType): ArrayToLandingPageMapper
    {
        foreach ($this->mappers as $mapper) {
            if ($mapper->satisfies($destinationType)) {
                return $mapper;
            }
        }

        throw new RuntimeException('No mapper found for destination type');
    }
}
