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

class ProjectV2Mapper implements ArrayToLandingPageMapper
{
    public function satisfies(LandingPageMapperEnum $sourceType): bool
    {
        return $sourceType === LandingPageMapperEnum::PROJECT_V2;
    }

    public function map(array $json): LandingPage
    {
        $landingPage = new LandingPage();

        $landingPage->addElement(new Meta(
            $json['name'],
            $json['title'] ?? null,
        ));

        $landingPage->addElement(new Hero(
            $json['hero_section']['hero']['title'] ?? '',
            $json['hero_section']['hero']['subtitle'] ?? '',
        ));

        $landingPage->addElement(new About(
            $json['about_section']['about']['subtitle'] ?? '',
            $json['about_section']['about']['content-left'] ?? '',
            $json['about_section']['about']['content-right'] ?? '',
            $json['about_section']['about']['learn-more'] ?? '',
            $json['about_section']['about_section'],
        ));

        $landingPage->addElement(new Newsletter(
            $json['newsletter_form']['newsletter']['info'] ?? '',
            $json['newsletter_form']['newsletter_form'],
        ));

        $landingPage->addElement(new Contact(
            $json['contact_form']['contact']['info'] ?? '',
            $json['contact_form']['contact']['email'] ?? '',
            $json['contact_form']['contact']['phone'] ?? '',
            $json['contact_form']['contact']['google_map_link'] ?? null,
            $json['contact_form']['contact_form'],
        ));

        return $landingPage;
    }
}
