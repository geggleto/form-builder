<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-05
 * Time: 3:04 PM
 */

namespace Forms\Test;


use Geggleto\Forms\Form;
use Geggleto\Forms\Input;

class RecursiveFinderTest extends \PHPUnit_Framework_TestCase
{
    public function testFindAllByType() {
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
        
        $results = $form->getAllElementsOfType('input');

        $this->assertCount(2, $results);
        $this->assertEquals('username', $results[0]->getAttribute('name'));
        $this->assertEquals('password', $results[1]->getAttribute('name'));
    }
}