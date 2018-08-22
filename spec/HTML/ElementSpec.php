<?php

namespace spec\ElementObjects\HTML;

use ElementObjects\HTML\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ElementSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Element::class);
    }

    function it_can_be_initialised_with_array_parameter()
    {
        $settings = [
            'tag' => 'div',
            'attributes' => ['class'=>'my-class'],
            'html' => '<p>hello</p>'
        ];

        $this->beConstructedWith($settings);

        $this->getTag()->shouldReturn('div');
        $this->getAttribute('class')->shouldReturn('my-class');
        $this->getHTML()->shouldReturn('<p>hello</p>');
    }

    function it_sets_tag()
    {
        $this->setTag('input');
        $this->getTag()->shouldReturn('input');
    }

    function it_sets_attribute()
    {
        // int
        $this->setAttribute('value', 1234567);
        $this->getAttribute('value')->shouldReturn(1234567);
        // bool
        $this->setAttribute('readonly', true);
        $this->getAttribute('readonly')->shouldReturn(true);
        // string
        $this->setAttribute('placeholder', 'this is place holder text');
        $this->getAttribute('placeholder')->shouldreturn('this is place holder text');
    }

    function it_gets_attributes()
    {
        $this->setAttribute('value', 1234567);
        $this->setAttribute('readonly', true);
        $this->setAttribute('placeholder', 'this is place holder text');

        $expected = [
            'value' => 1234567,
            'readonly' => true,
            'placeholder' => 'this is place holder text'
        ];

        $this->getAttributes()->shouldReturn($expected);
    }

    function it_sets_html()
    {
        $this->setHTML('<p>HTML to display between tags</p>');
        $this->getHTML()->shouldReturn('<p>HTML to display between tags</p>');
    }

    function it_sets_html_elements()
    {
        $ele = new Element(['tag'=>'strong']);
        $this->setHTML($ele);
        $this->getHTML()->shouldReturn($ele);
    }

    function it_sets_end_tag()
    {
        $this->setEndTag(false);
        $this->hasEndTag()->shouldReturn(false);
    }
}
