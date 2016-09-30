<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-09-30
 * Time: 10:04 AM
 */

namespace Geggleto\Forms\Schema;


class JsonParser implements Parser
{

    public function parseSchemaToArray($file = '')
    {
        if (!file_exists($file)) {
            throw new \InvalidArgumentException("Schema File Not Found");
        }

        $file = file_get_contents($file);

        return json_decode($file, true);
    }
}