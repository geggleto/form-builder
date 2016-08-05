<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-05
 * Time: 1:41 PM
 */

namespace Geggleto\Forms\Generator;


use Geggleto\Forms\Factory\Bootstrap\Factory;
use Geggleto\Forms\Factory\FactoryInterface;
use Geggleto\Forms\Form;

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
     * @return Form
     */
    public function generate(array $data, $btn= '') {
        $form = $this->factory->makeForm();

        foreach ($data as $item) {
            $form->addChild($this->factory->makeFormInput(
                $item['label'],
                $item['type'],
                $item['id'],
                $item['placeholder']
            ));
        }
        
        $form->addChild($this->factory->makeButton($btn));

        return $form;
    }
}