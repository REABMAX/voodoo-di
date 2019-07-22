<?php

namespace Voodoo\Di\Contracts;

/**
 * Interface ClassConfiguration
 * @package Voodoo\Di\Contracts
 */
interface ClassConfiguration
{
    /**
     * @return array
     */
    public function getConstructorArguments(): array;

    /**
     * @return array
     */
    public function getSetterArguments(): array;

    /**
     * @return string
     */
    public function getFqcn(): string;
}