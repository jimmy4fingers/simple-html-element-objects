<?php

namespace ElementObjects\HTML;

class ElementDecorator implements ElementDecoratorInterface
{
    private $element;

    /**
     * ElementDecorator constructor.
     *
     * @param ElementInterface $element
     */
    public function __construct(ElementInterface $element)
    {
        $this->element = $element;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getDecoratedTag()
            . $this->getDecoratedHTML()
            . $this->getDecoratedEndTag();
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->getDecoratedTag();
    }

    /**
     * @return string
     */
    public function getEndTag()
    {
        return $this->getDecoratedEndTag();
    }

    private function getDecoratedTag()
    {
        $attr = $this->element->getAttributes();
        $htmlTagParts[] = $this->element->getTag();

        $str = '<';
        if (is_array($attr) && !empty($attr)) {
            foreach ($attr as $key => $value) {
                $htmlTagParts[] = $key . '="'. $value .'"';
            }
        }
        $str .= implode(' ', $htmlTagParts);
        $str .= '>';

        return $str;
    }

    private function getDecoratedEndTag()
    {
        if ($this->element->getEndTag() === false) {
            return '';
        }

        return '</'.$this->element->getTag().'>';
    }

    private function getDecoratedHTML()
    {
        $html = $this->element->getHTML();

        if ($html instanceof ElementInterface) {
            $nestedElement = new self($html);
            return $nestedElement->__toString();
        }

        return $this->element->getHTML();
    }
}
