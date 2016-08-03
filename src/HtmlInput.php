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
}