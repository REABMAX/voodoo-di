<?php

namespace Voodoo\Di;

use Voodoo\Di\Contracts\ClassConfiguration;

class GeneralClassConfiguration implements ClassConfiguration
{
    /**
     * @var array
     */
    protected $constructorArguments = [];

    /**
     * @var array
     */
    protected $setterArguments = [];

    /**
     * @var string
     */
    protected $fqcn = null;

    /**
     * GeneralClassConfiguration constructor.
     * @param string $fqcn
     * @param array $options
     */
    public function __construct(string $fqcn, array $options)
    {
        $this->fqcn = $fqcn;

        if (array_key_exists('arguments', $options)) {
            foreach ($options['arguments'] as $argument) {
                $this->constructorArguments[] = new ConstructorArgument($argument);
            }
        }

        if (array_key_exists('setters', $options)) {
            foreach ($options['setters'] as $method => $arguments) {
                $this->setterArguments[] = new SetterArgument($method, $arguments);
            }
        }
    }

    /**
     * @return string
     */
    public function getFqcn(): string
    {
        return $this->fqcn;
    }

    /**
     * @return array
     */
    public function getConstructorArguments(): array
    {
        return $this->constructorArguments;
    }

    /**
     * @return array
     */
    public function getSetterArguments(): array
    {
        return $this->setterArguments;
    }
}