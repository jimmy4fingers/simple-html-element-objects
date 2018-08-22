<?php

namespace ElementObjects\HTML;

class HTMLDecorator
{
    /**
     * @var ElementInterface
     */
    private $element;
    /**
     * @var ElementInterface[]
     */
    private $parents;
    /**
     * @var ElementInterface[]
     */
    private $before;
    /**
     * @var ElementInterface[]
     */
    private $after;

    /**
     * @param ElementInterface $element
     */
    public function setElement(ElementInterface $element)
    {
        $this->element = $element;
    }

    /**
     * @param ElementInterface $element
     */
    public function setParentElement(ElementInterface $element)
    {
        $this->parents[] = $element;
    }

    /**
     * @param ElementInterface $element
     */
    public function setBeforeElement(ElementInterface $element)
    {
        $this->before[] = $element;
    }

    /**
     * @param ElementInterface $element
     */
    public function setAfterElement(ElementInterface $element)
    {
        $this->after[] = $element;
    }

    // @todo auto inject ElementDecorator
    public function __toString()
    {
        // TODO: write logic here

        // loop wrapper elements
            // loop before elements
                // element
            // loop after elements
        // end
        return '';
    }
}
