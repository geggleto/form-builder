<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-05
 * Time: 1:47 PM
 */

namespace Forms\Test;


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
                $factory->makeButton('Sign In')
            );
        
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
        ], 'Sign In');


        $this->assertEquals($form->render(), $form2->render());
    }
}