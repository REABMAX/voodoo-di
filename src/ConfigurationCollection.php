<?php

namespace Voodoo\Di;

/**
 * Class ConfigurationCollection
 * @package Voodoo\Di
 */
class ConfigurationCollection
{
    /**
     * @var array
     */
    protected $collection = [];

    /**
     * @param string $className
     */
    public function push(string $className)
    {
        if(!in_array($className, $this->collection)) {
            array_push($this->collection, $className);
        }
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->collection;
    }
}