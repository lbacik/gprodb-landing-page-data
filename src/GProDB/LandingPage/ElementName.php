<?php

declare(strict_types=1);

namespace GProDB\LandingPage;

enum ElementName: string
{
    case HERO = 'hero';
    case ABOUT = 'about';
    case CONTACT = 'contact';
    case NEWSLETTER = 'newsletter';
    case META = 'meta';
}
