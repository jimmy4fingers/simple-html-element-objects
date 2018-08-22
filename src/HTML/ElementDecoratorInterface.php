<?php
/**
 * Created by PhpStorm.
 * User: jamesle
 * Date: 21/08/2018
 * Time: 15:14
 */

namespace ElementObjects\HTML;

interface ElementDecoratorInterface
{
    public function __construct(ElementInterface $element);
    public function __toString();
    public function getTag();
    public function getEndTag();
}
