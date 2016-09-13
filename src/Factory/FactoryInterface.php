<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-05
 * Time: 1:41 PM
 */

namespace Geggleto\Forms\Factory;


use Geggleto\Forms\Element;

interface FactoryInterface
{
    /**
     * @param $label
     * @param $type
     * @param $id
     * @param $placeholder
     * @param array $data
     * @param string $labelCss
     * @param string $inputDivCss
     * @return Element
     */
    public function makeFormInput($label, $type, $id, $placeholder, array $data = [], $labelCss = 'col-sm-2 control-label', $inputDivCss = 'col-sm-10');


    /**
     * @param $text
     * @param string $buttonDivCss
     * @param string $onClickEvent
     *
     * @return Element
     */
    public function makeButton($text, $buttonDivCss = 'col-sm-offset-2 col-sm-10', $onClickEvent = '');

    /**
     * @return Element
     */
    public function makeForm();
}