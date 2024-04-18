<?php

declare(strict_types=1);

namespace GProDB\LandingPage;

use Exception;
use GProDB\LandingPage\Elements\AbstractElement;

class LandingPage
{
    private ElementCollection $elements;

    public function __construct(
    ) {
        $this->elements = new ElementCollection();
    }

    public function addElement(AbstractElement $element): static
    {
        if ($this->getElement($element->elementName()) !== null) {
            throw new Exception('element witch such name already exists');
        }
        
        $this->elements[] = $element;

        return $this;
    }
    
    public function getElement(ElementName $name): AbstractElement|null
    {
        $result = array_filter(
            $this->elements->getArrayCopy(),
            fn (AbstractElement $item) => $item->elementName() === $name
        );

        return array_shift($result);
    }

    public function getElements(): ElementCollection
    {
        return $this->elements;
    }

//    public static function fromArray(array $elements): static
//    {
//        $collection = new static(new ElementCollection());
//
//        foreach($elements as $element) {
//            $collection->addElement($element);
//        }
//
//        return $collection;
//    }
}
