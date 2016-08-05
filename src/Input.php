<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-03
 * Time: 11:02 AM
 */

namespace Geggleto\Forms;


class Input extends Element
{
    /**
     * HtmlForm constructor.
     */
    public function __construct()
    {
        parent::__construct('input');
    }

    /**
     * @return string
     */
    public function renderStartTag()
    {
        $stringAttributes = "";
        foreach ($this->getAttributes() as $name => $value) {
            $stringAttributes .= $name.'="'.$value.'" ';

        }
        return '<'.$this->getElementType().' '.$stringAttributes.'/>';    }

    /**
     * @return string
     */
    public function renderEndTag()
    {
        return '';
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->setAttribute('value', $value);

        return $this;
    }
}