<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-03
 * Time: 11:02 AM
 */

namespace Geggleto\Forms;


class Div extends Element
{
    /**
     * HtmlDiv constructor.
     */
    public function __construct()
    {
        parent::__construct('div');
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