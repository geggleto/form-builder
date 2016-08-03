<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-03
 * Time: 1:24 PM
 */

namespace Geggleto\Forms;


class Select extends Element
{
    public function __construct()
    {
        parent::__construct();
        $this->elementType = 'select';
    }
}