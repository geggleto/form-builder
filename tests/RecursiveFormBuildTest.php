<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-03
 * Time: 11:15 AM
 */

namespace Forms\Test;


use Geggleto\Forms\Form;
use Geggleto\Forms\Input;

class RecursiveFormBuildTest extends \PHPUnit_Framework_TestCase
{
    public function testRecursiveFormRender() {
        $form = (new Form())
            ->setId("loginForm")
            ->setMethod("post")
            ->addChild(
                (new Input())
                    ->setName("username")
                    ->setAttributes(
                    array(
                        "name" => "username",
                        "type" => "text"
                    ))
            )->addChild(
                (new Input())->setAttributes(
                    array(
                        "name" => "password",
                        "type" => "password"
                    ))
            );
        $formExpect = '<form id="loginForm" method="post" ><input name="username" type="text" /><input name="password" type="password" /></form>';
        $this->assertEquals($formExpect, $form->render());
    }

}