<?php

namespace Voodoo\Di;

/**
 * Class ContainerConfiguration
 * @package Voodoo\Di
 */
class ContainerConfiguration
{
    /**
     * @var array[ClassConfiguration]
     */
    protected $definitions = [];

    /**
     * @var array[FactoryConfiguration]
     */
    protected $factories = [];

    /**
     * @var array
     */
    protected $aliases = [];

    /**
     * ContainerConfiguration constructor.
     * @param array $configuration
     */
    public function __construct(array $configuration)
    {
        if (!empty($configuration['definitions'])) {
            foreach ($configuration['definitions'] as $fqcn => $options) {
                $this->definitions[$fqcn] = new GeneralClassConfiguration($fqcn, $options);
            }
        }

        if (!empty($configuration['factories'])) {
            foreach ($configuration['factories'] as $fqcn => $callback) {
                $this->factories[$fqcn] = new FactoryClassConfiguration($fqcn, $callback);
            }
        }

        if (!empty($configuration['aliases'])) {
            foreach ($configuration['aliases'] as $alias => $fqcn) {
                $this->aliases[$alias] = new AliasClassConfiguration($alias, $fqcn);
            }
        }
    }

    /**
     * @return array
     */
    public function getDefinitions(): array
    {
        return $this->definitions;
    }

    /**
     * @return array
     */
    public function getFactories(): array
    {
        return $this->factories;
    }

    /**
     * @return array
     */
    public function getAliases(): array
    {
        return $this->aliases;
    }
}