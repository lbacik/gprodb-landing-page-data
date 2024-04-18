<?php

declare(strict_types=1);

namespace GProDB\LandingPage\Mappers\LandingPageToArray;

use GProDB\LandingPage\Elements\AbstractElement;
use GProDB\LandingPage\LandingPage;
use GProDB\LandingPage\Mappers\LandingPageMapperEnum;
use GProDB\LandingPage\Mappers\LandingPageToArrayMapper;

class ProjectV3Mapper implements LandingPageToArrayMapper
{
    public function satisfies(LandingPageMapperEnum $destinationType): bool
    {
        return $destinationType === LandingPageMapperEnum::PROJECT_V3;
    }

    public function map(LandingPage $landingPage): array
    {
        $elements = $landingPage->getElements();
        $mappedElements = [];

        foreach ($elements as $element) {
            /** @var AbstractElement $element */
            $array = $element->toArray();
            if (!empty($array)) {
                $mappedElements[$element->elementName()->value] = $element->toArray();
            }
        }

        return $mappedElements;
    }
}
