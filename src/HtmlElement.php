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
    protected $id;

    /** @var string */
    protected $name;

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
        $this->attributes = $attributes;
        
        return $this;
    }

    /**
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function setAttribute($name, $value) {
        $this->attributes[$name] = $value;

        return $this;
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
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

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
        return '<'.$this->elementType.' id="'.$this->id.'" name="'.$this->name.'" '.$stringAttributes.'>';
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