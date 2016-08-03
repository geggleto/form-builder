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
        parent::__construct();
        
        $this->elementType = 'form';
    }

    /**
     * @param string $method
     * @return $this
     */
    public function setMethod($method) {
        $this->setAttribute('method', $method);

        return $this;
    }

    /**
     * @param string $action
     * @return $this
     */
    public function setAction($action) {
        $this->setAttribute('action', $action);

        return $this;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type) {
        $this->setAttribute('type', $type);

        return $this;
    }
    
}