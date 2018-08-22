<?php
/**
 * Created by PhpStorm.
 * User: jamesle
 * Date: 20/08/2018
 * Time: 11:15
 */

namespace ElementObjects\HTML;

class Element implements ElementInterface
{
    /**
     * HTML tag
     *
     * @var string
     */
    protected $tag;
    /**
     * array of HTML attributes
     *
     * @var array
     */
    protected $attributes;

    /**
     * HTML between tags
     *
     * @var string
     */
    protected $html;

    /**
     * has end HTML tag or not
     *
     * @var bool $endTag
     */
    protected $endTag = true;

    public function __construct(array $settings = [])
    {
        if (!empty($settings)) {
            $this->set($settings);
        }
    }

    /**
     * @param string      $attribute
     * @param $value mixed
     */
    public function setAttribute(string $attribute, $value)
    {
        $this->attributes[$attribute] = $value;
    }

    /**
     * @param  string $attribute
     * @return mixed
     */
    public function getAttribute(string $attribute)
    {
        return $this->attributes[$attribute];
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param string $tag
     */
    public function setTag(string $tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return string
     */
    public function getTag():string
    {
        return $this->tag;
    }

    /**
     * @param string|ElementInterface $html
     */
    public function setHTML($html)
    {
        $this->html = $html;
    }

    /**
     * @return string
     */
    public function getHTML()
    {
        return $this->html;
    }

    /**
     * @param bool $endTag
     */
    public function setEndTag(bool $endTag)
    {
        $this->endTag = $endTag;
    }

    /**
     * @return bool
     */
    public function getEndTag()
    {
        return $this->endTag;
    }

    /**
     * @param array $settings
     */
    protected function set(array $settings)
    {
        if (array_key_exists('tag', $settings)) {
            $this->setTag($settings['tag']);
        }

        if (array_key_exists('attributes', $settings) && is_array($settings['attributes'])) {
            foreach ($settings['attributes'] as $attr => $value) {
                $this->setAttribute($attr, $value);
            }
        }

        if (array_key_exists('html', $settings)) {
            $this->setHTML($settings['html']);
        }

        if (array_key_exists('endTag', $settings)) {
            $this->setEndTag($settings['endTag']);
        }
    }
}
