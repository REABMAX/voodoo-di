<?php

namespace Voodoo\Di;

/**
 * Class ConstructorArgument
 * @package Voodoo\Di
 */
class ConstructorArgument
{
    /**
     * @var
     */
    protected $value;

    /**
     * ConstructorArgument constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}