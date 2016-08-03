<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-03
 * Time: 10:08 AM
 */

namespace Geggleto\Forms;


abstract class HtmlElement
{
    /** @var array */
    protected $attributes;

    /** @var string */
    protected $elementType;

    /** @var array */
    protected $children;

    /**
     * HtmlElement constructor.
     */
    public function __construct()
    {
        $this->attributes = array();
        $this->children = array();
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        foreach ($attributes as $k => $v) {
            $this->setAttribute($k, $v); //force the (string) conversion
        }
        
        return $this;
    }

    /**
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function setAttribute($name, $value) {
        $this->attributes[(string)$name] = (string)$value;

        return $this;
    }

    /**
     * @param $name
     * 
     * @return mixed
     */
    public function getAttribute($name) {
        return $this->attributes[(string)$name];
    }

    /**
     * @param string $name
     * @return $this
     */
    public function removeAttribute($name) {
        unset($this->attributes[$name]);

        return $this;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->setAttribute('id', $id);

        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->setAttribute('name', $name);

        return $this;
    }


    /**
     * @return string
     */
    public function renderStartTag() {
        $stringAttributes = "";
        foreach ($this->attributes as $name => $value) {
            $stringAttributes .= $name.'="'.$value.'" ';

        }
        return '<'.$this->elementType.' '.$stringAttributes.'>';
    }

    /**
     * @return string
     */
    public function renderEndTag() {
        return "</$this->elementType>";
    }

    /**
     * @param HtmlElement $element
     * @return $this
     */
    public function addChild(HtmlElement $element) {
        $this->children[] = $element;

        return $this;
    }

    /**
     * @return string
     */
    public function render() {
        ob_start();

        print $this->renderStartTag();

        foreach($this->children as $child) {
            /** @var $child HtmlElement */
            print $child->render();
        }

        print $this->renderEndTag();

        $content = ob_get_clean();

        return $content;
    }
}