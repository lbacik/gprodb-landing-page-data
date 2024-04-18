<?php

declare(strict_types=1);

namespace GProDB\LandingPage;

class Builder
{
    private array $elements = [];
    
    public function __construct(
        private ElementBuildsDirector $elementBuildsDirector,    
    ) {
    }

    public function add(ElementName $elementName, array $data): static
    {
        $this->elements[] = $this->elementBuildsDirector->build($elementName, $data);
        
        return $this;
    }
    
    public function get(): LandingPage
    {
        return LandingPage::fromArray($this->elements);
    }
}
