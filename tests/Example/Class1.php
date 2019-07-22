<?php

namespace Voodoo\Di\Tests\Example;

/**
 * Class Class1
 * @package Voodoo\Di\Tests\Example
 */
class Class1
{
    protected $property1;

    protected $property2;

    public function __construct(string $property1)
    {
        $this->property1 = $property1;
    }

    /**
     * @param mixed $property2
     */
    public function setProperty2($property2): void
    {
        $this->property2 = $property2;
    }

    /**
     * @return string
     */
    public function getProperty1(): string
    {
        return $this->property1;
    }

    /**
     * @return mixed
     */
    public function getProperty2()
    {
        return $this->property2;
    }
}