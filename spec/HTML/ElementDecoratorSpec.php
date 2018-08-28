<?php

namespace spec\ElementObjects\HTML;

use ElementObjects\HTML\Element;
use ElementObjects\HTML\ElementDecorator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ElementDecoratorSpec extends ObjectBehavior
{
    function it_is_initializable(Element $element)
    {
        $this->beConstructedWith($element);
        $this->shouldHaveType(ElementDecorator::class);
    }

    function it_gets_tag()
    {
        $element = new Element(['tag'=>'div']);

        $this->beConstructedWith($element);
        $this->getTag()->shouldReturn('<div>');
    }

    function it_gets_tag_with_attributes()
    {
        $arguments = [
            'tag' => 'div',
            'attributes' => [
                'id' => 'my-element-id',
                'class' => 'my-class'
            ]
        ];

        $this->beConstructedWith(new Element($arguments));

        $this->getTag()->shouldReturn('<div id="my-element-id" class="my-class">');
    }

    function it_gets_end_tag()
    {
        $this->beConstructedWith(new Element(['tag'=>'ul']));
        $this->getEndTag()->shouldReturn('</ul>');
    }

    function it_gets_decorated()
    {
        $arguments = [
            'tag' => 'div',
            'attributes' => [
                'id' => 'my-element-id',
                'class' => 'my-class'
            ],
            'html' => '<p>html hello</p>'
        ];

        $expected = '<div id="my-element-id" class="my-class"><p>html hello</p></div>';

        $this->beConstructedWith(new Element($arguments));
        $this->__toString()->shouldReturn($expected);
    }

    function it_gets_decorated_with_nested_html_element_objects()
    {
        $nestedArgs = [
            'tag' => 'li',
            'attributes' => [
                'id' => 'first-link',
                'class' => 'nav-link'
            ],
            'html' => '<a href="http://www.google.co.uk">Nav Link</a>'
        ];
        $nestedElement = new Element($nestedArgs);

        $arguments = [
            'tag' => 'ul',
            'attributes' => [
                'id' => 'navigation',
                'class' => 'sub-nav'
            ],
            'html' => $nestedElement
        ];

        $expectedNested = '<li id="first-link" class="nav-link"><a href="http://www.google.co.uk">Nav Link</a></li>';
        $expected = '<ul id="navigation" class="sub-nav">'.$expectedNested.'</ul>';

        $this->beConstructedWith(new Element($arguments));
        $this->__toString()->shouldReturn($expected);
    }

    function it_decorates_multiple_levels_of_nested_elements()
    {
        $ele1 = new Element(['tag' => 'div', 'attributes' => ['id' => 'ele-1']]);
        $ele2 = new Element(['tag' => 'div', 'attributes' => ['id' => 'ele-2'], 'html' => $ele1]);
        $ele3 = new Element(['tag' => 'div', 'attributes' => ['id' => 'ele-3'], 'html' => $ele2]);
        $ele4 = new Element(['tag' => 'div', 'attributes' => ['id' => 'ele-4'], 'html' => $ele3]);

        $expected = '<div id="ele-4"><div id="ele-3"><div id="ele-2"><div id="ele-1"></div></div></div></div>';
        $this->beConstructedWith($ele4);
        $this->__toString()->shouldReturn($expected);
    }

    function it_ignores_html_end_tags_if_element_endTag_is_false()
    {
        $inputElement = new Element(['tag' => 'input', 'endTag' => false]);
        $expected = '<input>';
        $this->beConstructedWith($inputElement);
        $this->__toString()->shouldReturn($expected);
    }

    function it_sets_element()
    {
        $this->setElement(new Element(['tag' => 'div']));
        $this->__toString()->shouldReturn('<div></div>');
    }
}
