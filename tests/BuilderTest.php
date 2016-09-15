<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-09-14
 * Time: 10:10 AM
 */

namespace Forms\Test;


use Geggleto\Forms\Builder;
use Geggleto\Forms\Factory\Bootstrap\Factory;

class BuilderTest extends \PHPUnit_Framework_TestCase
{
    protected $target = __DIR__.'/userLoginForm.php';

    public function setUp()
    {
        if (file_exists($this->target)) {
            unlink($this->target);
        }
    }

    public function testBuild() {
        $builder = new Builder(new Factory());

        $schema = [];
        $schema[] = $builder->makeSchemaElement('username', 'Username', 'Username', 'text');

        $schema[] = $builder->makeSchemaElement('password', 'Password', 'Password', 'password');

        $schema[] = $builder->makeSchemaElement('domain', 'Domain', '', 'select')
            ->setOptions([
                [ 'name' => 'one', 'value' => 1 ],
                [ 'name' => 'two', 'value' => 2 ],
                [ 'name' => 'three', 'value' => 3 ],
            ]);

        $rootElement = $builder->build($schema, 'Login');

        $builder->write($rootElement, $this->target);

        $this->assertTrue(file_exists($this->target));

        $contents = file_get_contents($this->target);

        $generator = $builder->getGenerator();
        $form = $generator->generate([
            [
                'label' => 'Username',
                'type' => 'text',
                'id' => 'username',
                'placeholder' => 'Username',
                'value' => ''
            ],
            [
                'label' => 'Password',
                'type' => 'password',
                'id' => 'password',
                'placeholder' => 'Password',
                'value' => ''
            ],
            [
                'label' => 'Domain',
                'type' => 'select',
                'id' => 'domain',
                'placeholder' => '',
                'value' => '',
                'options' => [
                    [ 'name' => 'one', 'value' => 1 ],
                    [ 'name' => 'two', 'value' => 2 ],
                    [ 'name' => 'three', 'value' => 3 ],
                ]
            ],
        ], 'Login');

        $contents2 = $form->render();

        $this->assertEquals($contents2, $contents);
    }

    public function tearDown()
    {
        if (file_exists($this->target)) {
            unlink($this->target);
        }
    }
}