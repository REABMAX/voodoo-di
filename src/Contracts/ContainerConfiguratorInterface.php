<?php

namespace Voodoo\Di\Contracts;

use Psr\Container\ContainerInterface;
use Voodoo\Di\ContainerConfiguration;

/**
 * Interface ContainerConfiguratorInterface
 * @package Voodoo\Di\Contracts
 */
interface ContainerConfiguratorInterface
{
    /**
     * @param ContainerConfiguration $configuration
     * @return ContainerInterface
     */
    public function configureContainer(ContainerConfiguration $configuration): ContainerInterface;

    /**
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface;
}