<?php

declare(strict_types=1);

namespace GProDB\LandingPage;

use GProDB\LandingPage\Elements\AbstractElement;

class ElementBuildsDirector
{
    public function __construct(
        private array $builders,
    ) {
    }

    public function build(ElementName $name, array $data): AbstractElement
    {
        $builder = $this->getBuilderFor($name);
        
        if (!$builder) {
            throw new \Exception('no builder found');
        }
        
        return $builder->create($data);
    }
    
    private function getBuilderFor(ElementName $name): Builder|null
    {
        return array_filer($this->builders, fn ($item) => $item->supports() === $name)[0] ?? null;
    }
}
