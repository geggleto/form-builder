<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-04
 * Time: 8:22 AM
 */

namespace Geggleto\Forms\Factory\Bootstrap;


use Geggleto\Forms\Button;
use Geggleto\Forms\Div;
use Geggleto\Forms\Element;
use Geggleto\Forms\Factory\FactoryInterface;
use Geggleto\Forms\Form;
use Geggleto\Forms\Input;
use Geggleto\Forms\Label;

class Factory implements FactoryInterface
{
    
    /**
     * @param $label
     * @param $type
     * @param $id
     * @param $placeholder
     * @param $labelCss
     * @param $inputDivCss
     *
     * @return Element
     */
    public function makeFormInput($label, $type, $id, $placeholder, $labelCss = 'col-sm-2 control-label', $inputDivCss = 'col-sm-10') {
        return (new Div())
            ->setAttribute('class', 'form-group')
            ->addChild(
                (new Label())
                    ->setAttribute('for', $id)
                    ->setAttribute('class', $labelCss)
                    ->setInnerHtml($label)
            )
            ->addChild(
                (new Div())
                    ->setAttribute('class', $inputDivCss)
                    ->addChild(
                        (new Input())
                            ->setAttribute('type', $type)
                            ->setAttribute('class', 'form-control')
                            ->setAttribute('id', $id)
                            ->setAttribute('placeholder', $placeholder)
                    )
            );
    }

    /**
     * @param $text
     * @param string $buttonDivCss
     * @param string $onClickEvent
     *
     * @return Element
     */
    public function makeButton($text, $buttonDivCss = 'col-sm-offset-2 col-sm-10', $onClickEvent = '') {
        return (new Div())
            ->setAttribute('class', 'form-group')
            ->addChild(
                (new Div())
                    ->setAttribute('class', $buttonDivCss)
                    ->addChild(
                        (new Button())
                            ->setAttribute('type', 'submit')
                            ->setAttribute('class', 'btn btn-default')
                            ->setAttribute('onclick', $onClickEvent)
                            ->setInnerHtml($text)
                    )
            );
    }

    /**
     * @return Form
     */
    public function makeForm() {
        return (new Form())->setAttribute('class', 'form-horizontal');
    }

}