<?php

namespace ElementObjects\HTML;

class HTMLDecorator
{
    /**
     * @var ElementDecoratorInterface
     */
    private $element;
    /**
     * @var ElementDecoratorInterface[]
     */
    private $parents;
    /**
     * @var ElementDecoratorInterface[]
     */
    private $before;
    /**
     * @var ElementDecoratorInterface[]
     */
    private $after;


    /**
     * @param ElementDecoratorInterface $element
     */
    public function setElement(ElementDecoratorInterface $element)
    {
        $this->element = $element;
    }

    /**
     * @param ElementDecoratorInterface $element
     */
    public function setParentElement(ElementDecoratorInterface $element)
    {
        $this->parents[] = $element;
    }

    /**
     * @param ElementDecoratorInterface $element
     */
    public function setBeforeElement(ElementDecoratorInterface $element)
    {
        $this->before[] = $element;
    }

    /**
     * @param ElementDecoratorInterface $element
     */
    public function setAfterElement(ElementDecoratorInterface $element)
    {
        $this->after[] = $element;
    }

    public function __toString():string
    {
        return $this->setElementString();
    }

    private function setElementString()
    {
        $string = '';

        $string .= $this->getBeforeString();
        $string .= $this->element->__toString();
        $string .= $this->getAfterString();

        $string = $this->setParentString($string);

        return $string;
    }

    private function getBeforeString()
    {
        $string = '';
        if (!empty($this->before)) {
            foreach ($this->before as $element) {
                $string .= $element->__toString();
            }
        }
        return $string;
    }

    private function getAfterString()
    {
        $string = '';
        if (!empty($this->after)) {
            foreach ($this->after as $element) {
                $string .= $element->__toString();
            }
        }
        return $string;
    }

    private function setParentString($string)
    {
        if (!empty($this->parents)) {
            $startTags = '';
            foreach (array_reverse($this->parents) as $element) {
                $startTags .= $element->getTag();
            }
            $endTags = '';
            foreach ($this->parents as $element) {
                $endTags .= $element->getEndTag();
            }
            return $startTags . $string . $endTags;
        }
        return $string;
    }
}
