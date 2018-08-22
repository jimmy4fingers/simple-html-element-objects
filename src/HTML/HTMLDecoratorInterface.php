<?php
/**
 * Created by PhpStorm.
 * User: jamesle
 * Date: 20/08/2018
 * Time: 11:42
 */

namespace ElementObjects\HTML;

interface HTMLDecoratorInterface
{
    public function element(ElementInterface $element);
    public function beforeElement(ElementInterface $element);
    public function afterElement(ElementInterface $element);
    public function parentElement(ElementInterface $element);
    public function __toString();
}
