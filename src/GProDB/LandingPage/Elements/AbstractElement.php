<?php

declare(strict_types=1);

namespace GProDB\LandingPage\Elements;

use GProDB\LandingPage\ElementName;

abstract class AbstractElement
{
    abstract public function elementName(): ElementName;

    public function toArray(): array
    {
        return array_reduce(
            array_keys(get_object_vars($this)),
            fn($carry, $key) => !empty($this->{$key}) ? array_merge($carry, [$key => $this->{$key}]) : $carry,
            []
        );
    }
}
