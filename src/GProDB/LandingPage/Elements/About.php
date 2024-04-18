<?php

declare(strict_types=1);

namespace GProDB\LandingPage\Elements;

use GProDB\LandingPage\ElementName;

class About extends AbstractElement
{
    public function __construct(
        public string $subtitle = '',
        public string $columnLeft = '',
        public string $columnRight = '',
        public string $learnMoreUrl = '',
        public bool $enabled = true,
    ) {
    }

    public function elementName(): ElementName
    {
        return ElementName::ABOUT;
    }
}
