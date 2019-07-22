<?php

namespace Voodoo\Di;

use Voodoo\Di\Contracts\Factory;

/**
 * Class FactoryClassConfiguration
 * @package Voodoo\Di
 */
class FactoryClassConfiguration implements Factory
{
    /**
     * @var string
     */
    protected $fqcn = '';

    /**
     * @var callable
     */
    protected $callable = null;

    /**
     * FactoryClassConfiguration constructor.
     * @param string $fqcn
     * @param callable $callable
     */
    public function __construct(string $fqcn, callable $callable)
    {
        $this->fqcn = $fqcn;
        $this->callable = $callable;
    }

    /**
     * @return string
     */
    public function getFqcn(): string
    {
        return $this->fqcn;
    }

    /**
     * @return callable
     */
    public function getCallable(): callable
    {
        return $this->callable;
    }
}