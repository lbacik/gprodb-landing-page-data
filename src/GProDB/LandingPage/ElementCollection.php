<?php

declare(strict_types=1);

namespace GProDB\LandingPage;

use GProDB\LandingPage\Elements\AbstractElement;
use Sushi\ObjectCollection;

class ElementCollection extends ObjectCollection
{
    protected static string $type = AbstractElement::class;
}