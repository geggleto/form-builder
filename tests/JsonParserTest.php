<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-09-30
 * Time: 10:49 AM
 */

namespace Forms\Test;


use Geggleto\Forms\Schema\JsonParser;

class JsonParserTest extends \PHPUnit_Framework_TestCase
{
    public function testParse() {
        $parser = new JsonParser();
        $array = $parser->parseSchemaToArray(__DIR__."/form.json");

        $expected = [
            [
                'label' => 'Email',
                'type' => 'email',
                'id' => 'inputEmail3',
                'placeholder' => 'Email'
            ], [
                'label' => 'Password',
                'type' => 'password',
                'id' => 'inputPassword3',
                'placeholder' => 'Password'
            ]
        ];

        $this->assertSame($expected, $array);
    }
}