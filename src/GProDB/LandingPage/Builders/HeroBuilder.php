<?php

declare(strict_types=1);

namespace GProDB\LandingPage\Builders;

use GProDB\LandingPage\Elements\Hero;

class HeroBuilder
{
    public const TITLE = 'title';
    public const SUBTITLE = 'subtitle';
    
    public function create(array $data): Hero
    {
        return new Hero(
            $data[self::TITLE] ?? null,
            $data[self::SUBTITLE] ?? null,
        );
    }
}
