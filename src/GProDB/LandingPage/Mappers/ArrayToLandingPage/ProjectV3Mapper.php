<?php

declare(strict_types=1);

namespace GProDB\LandingPage\Mappers\ArrayToLandingPage;

use Exception;
use GProDB\LandingPage\ElementName;
use GProDB\LandingPage\Elements\About;
use GProDB\LandingPage\Elements\Contact;
use GProDB\LandingPage\Elements\Hero;
use GProDB\LandingPage\Elements\Meta;
use GProDB\LandingPage\Elements\Newsletter;
use GProDB\LandingPage\LandingPage;
use GProDB\LandingPage\Mappers\ArrayToLandingPageMapper;
use GProDB\LandingPage\Mappers\LandingPageMapperEnum;

class ProjectV3Mapper implements ArrayToLandingPageMapper
{
    public function satisfies(LandingPageMapperEnum $sourceType): bool
    {
        return $sourceType === LandingPageMapperEnum::PROJECT_V3;
    }

    public function map(array $json): LandingPage
    {
        $landingPage = new LandingPage();

        foreach($json as $key => $value) {
            match(ElementName::tryFrom($key)) {
                ElementName::META => $landingPage->addElement(new Meta(
                    $value['name'],
                    $value['title'] ?? null,
                )),
                ElementName::HERO => $landingPage->addElement(new Hero(
                    $value['title'],
                    $value['subtitle'] ?? '',
                )),
                ElementName::ABOUT => $landingPage->addElement(new About(
                    $value['subtitle'] ?? '',
                    $value['columnLeft'] ?? '',
                    $value['columnRight'] ?? '',
                    $value['learnMoreUrl'] ?? '',
                    $value['enabled'] ?? false,
                )),
                ElementName::CONTACT => $landingPage->addElement(new Contact(
                    description: $value['description'] ?? '',
                    enabled: $value['enabled'] ?? false,
                )),
                ElementName::NEWSLETTER => $landingPage->addElement(new Newsletter(
                    $value['description'] ?? '',
                    $value['enabled'] ?? false,
                )),
                default => throw new Exception('Invalid element name')
            };
        }

        return $landingPage;
    }
}
