<?php

declare(strict_types=1);

namespace GProDB\LandingPage\Elements;

use GProDB\LandingPage\ElementName;

class Hero extends AbstractElement
{
    public function __construct(
        public string $title,
        public string $subtitle = '',
    ) {
    }

    public function elementName(): ElementName
    {
        return ElementName::HERO;
    }
}
