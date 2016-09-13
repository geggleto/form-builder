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
        parent::__construct('select');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        //Recurse through all option values
        foreach($this->getChildren() as $child) {
            /** @var $child Element */
            if ($child->getElementType() == 'option') {
                if ($child->getAttribute('value') == $value) {
                    $child->setAttribute('checked', 'checked');
                }
            }
        }

        return $this;
    }

    public function setChildren(array $options) {
        $this->clearChildren();

        foreach ($options as $option) {
            $this->addChild(
                (new Option())
                    ->setValue($option['value'])
                    ->setInnerHtml($option['name'])
            );
        }

        return $this;
    }
}