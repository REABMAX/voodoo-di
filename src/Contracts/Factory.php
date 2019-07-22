<?php

namespace Voodoo\Di\Contracts;

/**
 * Interface Factory
 * @package Voodoo\Di\Contracts
 */
interface Factory
{
    /**
     * @return callable
     */
    public function getCallable(): callable;

    /**
     * @return string
     */
    public function getFqcn(): string;
}