<?php

namespace GProDB\LandingPage\Elements;

use GProDB\LandingPage\ElementName;
use GProDB\LandingPage\Elements\AbstractElement;

class Meta extends AbstractElement
{
    public function __construct(
        public string $name,
        public string|null $title,
    ) {
    }

    public function elementName(): ElementName
    {
        return ElementName::META;
    }
}
