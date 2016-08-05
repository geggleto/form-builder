<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-03
 * Time: 2:19 PM
 */

namespace Geggleto\Forms;


class Label extends Element
{
    /**
     * HtmlForm constructor.
     */
    public function __construct()
    {
        parent::__construct('label');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->setInnerHtml($value);

        return $this;
    }
}