<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-05
 * Time: 10:26 AM
 */

namespace Forms\Test;


use Geggleto\Forms\Factory\Bootstrap\Factory;
use Geggleto\Forms\Form;

class RecursiveFormSetDataTest extends \PHPUnit_Framework_TestCase
{
    public function testSetData() {
        $factory = new Factory(); //bootstrap factory

        //Make Email field
        $email = $factory->makeFormInput('Email', 'email', 'inputEmail3', 'Email');
        $email->getChild(1)->getChild(0)->setAttribute('name', 'email');

        //Make password
        $password = $factory->makeFormInput('Password', 'password', 'inputPassword3', 'Password');
        $password->getChild(1)->getChild(0)->setAttribute('name', 'password');

        $form = (new Form())
            ->setAttribute('class', 'form-horizontal')
            ->addChild(
                $email
            )->addChild(
                $password
            )->addChild(
                $factory->makeButton('Sign In')
            )->setData([
                "email" => 'test@test.com',
                "password" => "123456"
            ]);

        $this->assertEquals("test@test.com", $email->getChild(1)->getChild(0)->getAttribute('value'));
        $this->assertEquals("123456", $password->getChild(1)->getChild(0)->getAttribute('value'));
    }
}