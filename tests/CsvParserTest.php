<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-09-30
 * Time: 9:52 AM
 */

namespace Forms\Test;


use Geggleto\Forms\Schema\CsvParser;

class CsvParserTest extends \PHPUnit_Framework_TestCase
{
    public function testParse() {
        $parser = new CsvParser();
        $array = $parser->parseSchemaCsvToArray(__DIR__."/form.csv");

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