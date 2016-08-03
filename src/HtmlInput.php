<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-03
 * Time: 11:02 AM
 */

namespace Geggleto\Forms;


class HtmlInput extends HtmlElement
{
    /**
     * HtmlForm constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->elementType = 'input';
    }

    /**
     * @return string
     */
    public function renderStartTag()
    {
        $stringAttributes = "";
        foreach ($this->attributes as $name => $value) {
            $stringAttributes .= $name.'="'.$value.'" ';

        }
        return '<'.$this->elementType.' '.$stringAttributes.'/>';    }

    /**
     * @return string
     */
    public function renderEndTag()
    {
        return '';
    }
}