<?php

namespace spec\ElementObjects\HTML;

use ElementObjects\HTML\Element;
use ElementObjects\HTML\ElementDecorator;
use ElementObjects\HTML\HTMLDecorator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HTMLDecoratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(HTMLDecorator::class);
    }

    function it_sets_element()
    {
        $this->setElement(new ElementDecorator(new Element(['tag'=>'li'])));

        $this->__toString()->shouldReturn('<li></li>');
    }

    function it_sets_parent_elements()
    {
        $this->setElement(new ElementDecorator(new Element(['tag'=>'li'])));
        $this->setParentElement(new ElementDecorator(new Element(['tag'=>'div'])));

        $this->__toString()->shouldReturn('<div><li></li></div>');
    }

    function it_sets_before_elements()
    {
        $this->setElement(new ElementDecorator(new Element(['tag'=>'ul'])));
        $this->setBeforeElement(new ElementDecorator(new Element(['tag'=>'div'])));

        $this->__toString()->shouldReturn('<div></div><ul></ul>');
    }

    function it_sets_after_elements()
    {
        $this->setElement(new ElementDecorator(new Element(['tag'=>'a'])));
        $this->setAfterElement(new ElementDecorator(new Element(['tag'=>'strong'])));

        $this->__toString()->shouldReturn('<a></a><strong></strong>');
    }

    function it_sets_multiple_before_elements()
    {
        $this->setElement(new ElementDecorator(new Element(['tag'=>'p'])));
        $this->setBeforeElement(new ElementDecorator(new Element(['tag'=>'a'])));
        $this->setBeforeElement(new ElementDecorator(new Element(['tag'=>'ul'])));
        $this->setBeforeElement(new ElementDecorator(new Element(['tag'=>'strong'])));

        $this->__toString()->shouldReturn('<a></a><ul></ul><strong></strong><p></p>');
    }

    function it_sets_multiple_after_elements()
    {
        $this->setElement(new ElementDecorator(new Element(['tag'=>'p'])));
        $this->setAfterElement(new ElementDecorator(new Element(['tag'=>'a'])));
        $this->setAfterElement(new ElementDecorator(new Element(['tag'=>'ul'])));
        $this->setAfterElement(new ElementDecorator(new Element(['tag'=>'strong'])));

        $this->__toString()->shouldReturn('<p></p><a></a><ul></ul><strong></strong>');
    }

    function it_sets_multiple_parent_elements()
    {
        $this->setElement(new ElementDecorator(new Element(['tag'=>'a'])));
        $this->setParentElement(new ElementDecorator(new Element(['tag'=>'p'])));
        $this->setParentElement(new ElementDecorator(new Element(['tag'=>'div'])));
        $this->setParentElement(new ElementDecorator(new Element(['tag'=>'html'])));

        $this->__toString()->shouldReturn('<html><div><p><a></a></p></div></html>');
    }
}
