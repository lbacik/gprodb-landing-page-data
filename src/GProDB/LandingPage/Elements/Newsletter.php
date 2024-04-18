<?php

declare(strict_types=1);

namespace GProDB\LandingPage\Elements;

use GProDB\LandingPage\ElementName;

class Newsletter extends AbstractElement
{
    public function __construct(
        public string $description = '',
        public bool $enabled = true,
    ) {
    }

    public function elementName(): ElementName
    {
        return ElementName::NEWSLETTER;
    }
}
