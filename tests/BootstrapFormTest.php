<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-03
 * Time: 2:16 PM
 */

namespace Forms\Test;


use Geggleto\Forms\Button;
use Geggleto\Forms\Div;
use Geggleto\Forms\Form;
use Geggleto\Forms\Input;
use Geggleto\Forms\Label;

class BootstrapFormTest extends \PHPUnit_Framework_TestCase
{
    public function testRenderBootstrapForm() {
        $bootstrapForm = '<form class="form-horizontal" >
<div class="form-group" >
<label for="inputEmail3" class="col-sm-2 control-label" >Email</label>
<div class="col-sm-10" >
<input type="email" class="form-control" id="inputEmail3" placeholder="Email" />
</div>
</div>
<div class="form-group" >
<label for="inputPassword3" class="col-sm-2 control-label" >Password</label>
<div class="col-sm-10" >
<input type="password" class="form-control" id="inputPassword3" placeholder="Password" />
</div>
</div>
<div class="form-group" >
<div class="col-sm-offset-2 col-sm-10" >
<button type="submit" class="btn btn-default" >Sign in</button>
</div>
</div>
</form>';

        $bootstrapForm = str_replace("\n", "", $bootstrapForm);
        $bootstrapForm = str_replace("\r", "", $bootstrapForm);

        $form = (new Form())
            ->setAttribute('class', 'form-horizontal')
            ->addChild(
                (new Div())
                    ->setAttribute('class', 'form-group')
                    ->addChild(
                        (new Label())
                            ->setAttribute('for', 'inputEmail3')
                            ->setAttribute('class', 'col-sm-2 control-label')
                            ->setInnerHtml('Email')
                    )
                    ->addChild(
                        (new Div())
                            ->setAttribute('class', 'col-sm-10')
                            ->addChild( 
                                (new Input())
                                    ->setAttribute('type', 'email')
                                    ->setAttribute('class', 'form-control')
                                    ->setAttribute('id', 'inputEmail3')
                                    ->setAttribute('placeholder', 'Email')
                            )
                    )
            )->addChild(
                (new Div())
                    ->setAttribute('class', 'form-group')
                    ->addChild(
                        (new Label())
                            ->setAttribute('for', 'inputPassword3')
                            ->setAttribute('class', 'col-sm-2 control-label')
                            ->setInnerHtml('Password')
                    )
                    ->addChild(
                        (new Div())
                            ->setAttribute('class', 'col-sm-10')
                            ->addChild(
                                (new Input())
                                    ->setAttribute('type', 'password')
                                    ->setAttribute('class', 'form-control')
                                    ->setAttribute('id', 'inputPassword3')
                                    ->setAttribute('placeholder', 'Password')
                            )
                    )
            )->addChild(
                (new Div())
                    ->setAttribute('class', 'form-group')
                    ->addChild(
                        (new Div())
                            ->setAttribute('class', 'col-sm-offset-2 col-sm-10')
                            ->addChild(
                                (new Button())
                                    ->setAttribute('type', 'submit')
                                    ->setAttribute('class', 'btn btn-default')
                                    ->setInnerHtml('Sign in')
                            )
                    )
            );


        $this->assertEquals($bootstrapForm, $form->render());
    }

}