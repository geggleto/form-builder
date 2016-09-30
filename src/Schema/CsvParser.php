<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-09-30
 * Time: 9:42 AM
 */

namespace Geggleto\Forms\Schema;

/**
 * Class CsvParser
 *
 * @package Geggleto\Forms\Schema
 */
class CsvParser implements Parser
{
    public function parseSchemaToArray($file = '') {
        if (!file_exists($file)) {
            throw new \InvalidArgumentException("Schema File Not Found");
        }

        $fh = fopen($file, "r");

        $out = array();

        while(($line = fgetcsv($fh, 0)) !== FALSE) {
            $label = $line[0];
            $type = $line[1];
            $id = $line[2];
            $placeholder = $line[3];
            $out[] = [
                'label' => $label,
                'type' => $type,
                'id' => $id,
                'placeholder' => $placeholder
            ];
        }
        fclose($fh);

        return $out;
    }
}