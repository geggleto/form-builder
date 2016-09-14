<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-09-14
 * Time: 9:29 AM
 */

namespace Geggleto\Forms;


class SchemaElement
{
    /** @var string */
    protected $label;

    /** @var string */
    protected $type;

    /** @var string */
    protected $id;

    /** @var string */
    protected $placeholder;

    /** @var string */
    protected $options;


    /**
     * SchemaElement constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    /**
     * @param mixed $placeholder
     * @return $this
     */
    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param mixed $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }


    public function toArray() {

        return [
            'label' => $this->getLabel(),
            'type' => $this->getType(),
            'id' => $this->getId(),
            'placeholder' => $this->getPlaceholder(),
            'options' => $this->getOptions()
        ];
    }

}