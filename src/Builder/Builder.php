<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-09-14
 * Time: 9:14 AM
 */

namespace Geggleto\Forms;


use Geggleto\Forms\Element;
use Geggleto\Forms\Factory\FactoryInterface;
use Geggleto\Forms\Generator\Generator;

class Builder
{
    /** @var string */
    protected $table;

    /** @var FactoryInterface */
    protected $factory;

    /** @var Generator */
    protected $generator;

    /**
     * Builder constructor.
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {

        $this->factory = $factory;

        $this->generator = new Generator($this->factory);
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @return FactoryInterface
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * @return Generator
     */
    public function getGenerator()
    {
        return $this->generator;
    }

    /**
     * @param $id
     * @param $label
     * @param $placeholder
     * @param $type
     *
     * @return SchemaElement
     */
    public function makeSchemaElement($id, $label, $placeholder, $type) {
        return (new SchemaElement())
            ->setId($id)
            ->setLabel($label)
            ->setPlaceholder($placeholder)
            ->setType($type);
    }

    /**
     * @param array $schemaArray
     * @param $buttonName
     * @return Element
     */
    public function build(array $schemaArray, $buttonName) {

        $schema = [];

        foreach ($schemaArray as $item) {
            if (is_array($item)) {
                $schema[] = $item;
            } else {
                $schema[] = $item->toArray();
            }
        }

        return  $this->generator->generate($schema, $buttonName);
    }

    /**
     * @param Element $root
     * @param $filename
     * @return bool
     */
    public function write(Element $root, $filename) {


        $fh = fopen($filename, "w");

        if ($fh) {
            fwrite($fh, $root->render());
        } else {
            fclose($fh);
            throw new \InvalidArgumentException("File is not writable. " . $filename);
        }

        fclose($fh);

        return true;
    }
}