<?php

namespace Voodoo\Di\Contracts;

/**
 * Interface Alias
 * @package Voodoo\Di\Contracts
 */
interface Alias
{
    /**
     * @return string
     */
    public function getAlias(): string;

    /**
     * @return mixed
     */
    public function getFqcn();
}