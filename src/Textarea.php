<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-03
 * Time: 1:24 PM
 */

namespace Geggleto\Forms;


class Textarea extends Element
{
    public function __construct()
    {
        parent::__construct('textarea');
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