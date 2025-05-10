<?php

declare(strict_types=1);

namespace GProDB\LandingPage;

use GProDB\LandingPage\Mappers\ArrayToLandingPage;
use GProDB\LandingPage\Mappers\ArrayToLandingPageMapperCollection;
use GProDB\LandingPage\Mappers\LandingPageToArray;
use GProDB\LandingPage\Mappers\LandingPageToArrayMapperCollection;

class MapperFactory
{
    public function createLandingPageToArray(): LandingPageToArray
    {
        return new LandingPageToArray(
            new LandingPageToArrayMapperCollection([
                new LandingPageToArray\ProjectV3Mapper(),
            ])
        );
    }

    public function createArrayToLandingPage(): ArrayToLandingPage
    {
        return new ArrayToLandingPage(
            new ArrayToLandingPageMapperCollection([
                new ArrayToLandingPage\ProjectV1Mapper(),
                new ArrayToLandingPage\ProjectV2Mapper(),
                new ArrayToLandingPage\ProjectV3Mapper(),
            ])
        );
    }
}
