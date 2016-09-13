<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-05
 * Time: 1:41 PM
 */

namespace Geggleto\Forms\Generator;


use Geggleto\Forms\Element;
use Geggleto\Forms\Factory\FactoryInterface;

class Generator
{
    /**
     * @var FactoryInterface
     */
    protected $factory;

    /**
     * JsonGenerator constructor.
     * @param FactoryInterface $factoryInterface
     */
    public function __construct(FactoryInterface $factoryInterface)
    {
        $this->factory = $factoryInterface;
    }

    /**
     * @param $data
     *
     * @return Element
     */
    public function generate(array $data, $btn= '') {
        $form = $this->factory->makeForm();

        foreach ($data as $element) {
            $options = isset($element['options'])?$element['options']:[];

            $form->addChild($this->factory->makeFormInput(
                $element['label'],
                $element['type'],
                $element['id'],
                $element['placeholder'],
                $options
            ));
        }
        
        $form->addChild($this->factory->makeButton($btn));

        return $form;
    }
}