<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-09-30
 * Time: 10:05 AM
 */
namespace Geggleto\Forms\Schema;


interface Parser
{
    public function parseSchemaToArray($file = '');
}