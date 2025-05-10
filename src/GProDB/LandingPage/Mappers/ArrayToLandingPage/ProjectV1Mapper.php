<?php

declare(strict_types=1);

namespace GProDB\LandingPage\Mappers\ArrayToLandingPage;

use GProDB\LandingPage\Elements\About;
use GProDB\LandingPage\Elements\Contact;
use GProDB\LandingPage\Elements\Hero;
use GProDB\LandingPage\Elements\Meta;
use GProDB\LandingPage\Elements\Newsletter;
use GProDB\LandingPage\LandingPage;
use GProDB\LandingPage\Mappers\ArrayToLandingPageMapper;
use GProDB\LandingPage\Mappers\LandingPageMapperEnum;

class ProjectV1Mapper implements ArrayToLandingPageMapper
{
    public function satisfies(LandingPageMapperEnum $sourceType): bool
    {
        return $sourceType === LandingPageMapperEnum::PROJECT_V1;
    }

    public function map(array $json): LandingPage
    {
        $landingPage = new LandingPage();

        $landingPage->addElement(new Meta(
            $json['name'],
            $json['title'],
        ));

        $landingPage->addElement(new Hero(
            $json['hero']['title'] ?? '',
            $json['hero']['sub-title'] ?? '',
        ));

        $landingPage->addElement(new About(
            $json['about']['sub-title'] ?? '',
            $json['about']['content-left'] ?? '',
            $json['about']['content-right'] ?? '',
            $json['about']['learn-more'] ?? '',
        ));

        $landingPage->addElement(new Newsletter(
            $json['newsletter']['info'] ?? '',
            $json['newsletter']['enabled'] ?? false,
        ));

        $landingPage->addElement(new Contact(
            $json['contact']['info'] ?? '',
            $json['contact']['email'] ?? '',
            $json['contact']['phone'] ?? '',
            $json['contact']['google_map_link'] ?? '',
            $json['contact']['enabled'] ?? false,
        ));

        return $landingPage;
    }
}
