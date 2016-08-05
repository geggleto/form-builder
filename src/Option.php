<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-03
 * Time: 1:24 PM
 */

namespace Geggleto\Forms;


class Option extends Element
{
    public function __construct()
    {
        parent::__construct('option');
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