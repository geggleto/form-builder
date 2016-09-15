<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-05
 * Time: 1:47 PM
 */

namespace Forms\Test;


use Geggleto\Forms\Element;
use Geggleto\Forms\Factory\Bootstrap\Factory;
use Geggleto\Forms\Form;
use Geggleto\Forms\Generator\Generator;

class GeneratorHtmlTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerator() {
        $factory = new Factory(); //bootstrap factory

        $form = (new Form())
            ->setAttribute('class', 'form-horizontal')
            ->addChild(
                $factory->makeFormInput('Email', 'email', 'inputEmail3', 'Email')
            )->addChild(
                $factory->makeFormInput('Password', 'password', 'inputPassword3', 'Password')
            )->addChild(
                $factory->makeFormInput('testSelect', 'select', 'select4', '', [
                    [
                        'name' => 'one',
                        'value' => 1
                    ],
                    [
                        'name' => 'two',
                        'value' => 2
                    ]
                ])
            )
            ->addChild(
                $factory->makeButton('Sign In')
            );

        $elements = $form->getAllElementsOfType('input');
        /** @var $input Element */
        foreach ($elements as $input) {
            $input->setAttribute('value', isset($element['value'])?$element['value']:"");
        }

        $generator = new Generator($factory);
        $form2 = $generator->generate([
            [
                'label' => 'Email',
                'type' => 'email',
                'id' => 'inputEmail3',
                'placeholder' => 'Email'
            ],
            [
                'label' => 'Password',
                'type' => 'password',
                'id' => 'inputPassword3',
                'placeholder' => 'Password'
            ],
            [
                'label' => 'testSelect',
                'type' => 'select',
                'id' => 'select4',
                'placeholder' => '',
                'options' => [
                    [
                        'name' => 'one',
                        'value' => 1
                    ],
                    [
                        'name' => 'two',
                        'value' => 2
                    ],
                ]
            ]

        ], 'Sign In');

        $this->assertEquals($form->render(), $form2->render());
    }
}