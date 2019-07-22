<?php

namespace Voodoo\Di\Configurators;

use League\Container\Container;
use Psr\Container\ContainerInterface;
use Voodoo\Di\ConstructorArgument;
use Voodoo\Di\ContainerConfiguration;
use Voodoo\Di\Contracts\Alias;
use Voodoo\Di\Contracts\ClassConfiguration;
use Voodoo\Di\Contracts\ContainerConfiguratorInterface;
use Voodoo\Di\Contracts\Factory;
use Voodoo\Di\SetterArgument;

/**
 * Class LeagueContainerConfigurator
 * @package Voodoo\Di\Configurators
 */
class LeagueContainerConfigurator implements ContainerConfiguratorInterface
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * LeagueContainerConfigurator constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }

    /**
     * @param ContainerConfiguration $configuration
     * @return ContainerInterface
     */
    public function configureContainer(ContainerConfiguration $configuration): ContainerInterface
    {
        $definitions = [];

        /** @var ClassConfiguration $classConfiguration */
        foreach ($configuration->getDefinitions() as $classConfiguration) {
            $fqcn = $classConfiguration->getFqcn();

            if (!array_key_exists($fqcn, $definitions)) {
                $definition = $this->container->add($classConfiguration->getFqcn());
            } else {
                $definition = $definitions[$fqcn];
            }

            /** @var ConstructorArgument $argument */
            foreach ($classConfiguration->getConstructorArguments() as $argument) {
                $definition->addArgument($argument->getValue());
            }

            /** @var SetterArgument $argument */
            foreach ($classConfiguration->getSetterArguments() as $argument) {
                $definition->addMethodCall($argument->getMethod(), $argument->getArguments());
            }

            $definitions[$classConfiguration->getFqcn()] = $definition;
        }

        /** @var Factory $classConfiguration */
        foreach ($configuration->getFactories() as $classConfiguration) {
            $definitions[$classConfiguration->getFqcn()] = $this->container->add($classConfiguration->getFqcn(), $classConfiguration->getCallable());
        }

        /** @var Alias $classConfiguration */
        foreach ($configuration->getAliases() as $classConfiguration) {
            $fqcn = $classConfiguration->getFqcn();
            if (array_key_exists($fqcn, $definitions)) {
                $definitions[$fqcn]->setAlias($classConfiguration->getAlias());
            } else {
                $definitions[$fqcn] = $this->container->add($classConfiguration->getAlias(), $classConfiguration->getFqcn());
            }
        }

        $this->container->add(ContainerInterface::class, $this->container);

        return $this->container;
    }
}