<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-03
 * Time: 10:06 AM
 */

namespace Geggleto\Forms;


class HtmlForm extends HtmlElement
{
    /**
     * HtmlForm constructor.
     */
    public function __construct()
    {
        $this->type = 'form';
        $this->attributes = array();
    }

    /**
     * @param $method
     * @return $this
     */
    public function setMethod($method) {
        $this->attributes['method'] = $method;

        return $this;
    }
    
}