<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-08-03
 * Time: 2:16 PM
 */

namespace Forms\Test;


use Geggleto\Forms\Factory\Bootstrap\Factory;
use Geggleto\Forms\Form;

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
<button type="submit" class="btn btn-default" onclick="" >Sign In</button>
</div>
</div>
</form>';

        $bootstrapForm = str_replace("\n", "", $bootstrapForm);
        $bootstrapForm = str_replace("\r", "", $bootstrapForm);

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


        $this->assertEquals($bootstrapForm, $form->render());
    }

}