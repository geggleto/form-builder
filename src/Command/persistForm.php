<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-09-13
 * Time: 11:15 AM
 */
use Geggleto\Forms\Generator\Generator;
use Geggleto\Forms\Factory\Bootstrap\Factory;

include_once __DIR__ . "/../../vendor/autoload.php";

if ($argc != 3) {
    print "Usage : composer persist path/To/Form/Array.php path/to/output.php";
}

$formArray = include $argv[1];

$generator = new Generator(new Factory());

$form2 = $generator->generate($formArray, 'Sign In');

$fh = fopen($argv[2], "w");
fwrite($fh, $form2->render());
fclose($fh);
