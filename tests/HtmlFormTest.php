<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-03
 * Time: 10:27 AM
 */

namespace Forms\Test;


use Geggleto\Forms\HtmlForm;

class HtmlFormTest extends \PHPUnit_Framework_TestCase
{
    public function testRender() {
        $form = new HtmlForm();
        $form->setId('test');
        $form->setName('test');

        $formStartTag = '<form id="test" name="test" >';
        $this->assertEquals($formStartTag, $form->renderStartTag());
        $this->assertEquals('</form>', $form->renderEndTag());
    }

    public function testRenderWithAttributes() {
        $form = new HtmlForm();
        $form->setId('test');
        $form->setName('test');
        $form->setAttributes(array(
           "k" => "v"
        ));

        $formStartTag = '<form id="test" name="test" k="v" >';
        $this->assertEquals($formStartTag, $form->renderStartTag());
        $this->assertEquals('</form>', $form->renderEndTag());
    }

    public function testRenderWithAttributesAndMethodChaning() {
        $form = (new HtmlForm())
            ->setId('test')
            ->setName('test')
            ->setAttributes(array(
                "k" => "v"
            ));

        $formStartTag = '<form id="test" name="test" k="v" >';
        $this->assertEquals($formStartTag, $form->renderStartTag());
        $this->assertEquals('</form>', $form->renderEndTag());
    }
}