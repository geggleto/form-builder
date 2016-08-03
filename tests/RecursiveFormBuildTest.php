<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-03
 * Time: 11:15 AM
 */

namespace Forms\Test;


use Geggleto\Forms\HtmlForm;
use Geggleto\Forms\HtmlInput;

class RecursiveFormBuildTest extends \PHPUnit_Framework_TestCase
{
    public function testRecursiveFormRender() {
        $form = (new HtmlForm())
            ->setId("loginForm")
            ->setMethod("post")
            ->addChild(
                (new HtmlInput())
                    ->setName("username")
                    ->setAttributes(
                    array(
                        "name" => "username",
                        "type" => "text"
                    ))
            )->addChild(
                (new HtmlInput())->setAttributes(
                    array(
                        "name" => "password",
                        "type" => "password"
                    ))
            );
        $formExpect = '<form id="loginForm" method="post" ><input name="username" type="text" /><input name="password" type="password" /></form>';
        $this->assertEquals($formExpect, $form->render());
    }

}