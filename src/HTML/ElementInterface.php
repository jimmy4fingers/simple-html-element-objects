<?php
/**
 * Created by PhpStorm.
 * User: jamesle
 * Date: 20/08/2018
 * Time: 11:47
 */

namespace ElementObjects\HTML;

interface ElementInterface
{
    public function __construct(array $settings = []);
    public function setAttribute(string $attribute, $value);
    public function getAttribute(string $attribute);
    public function getAttributes();
    public function setTag(string $tag);
    public function getTag();
    public function getEndTag();
    public function setEndTag(bool $endTag);
    public function setHTML($html);
    public function getHTML();
}