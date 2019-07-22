<?php

namespace Voodoo\Di;

/**
 * Class SetterArgument
 * @package Voodoo\Di
 */
class SetterArgument
{
    /**
     * @var string
     */
    protected $method = '';

    /**
     * @var array
     */
    protected $arguments = [];

    public function __construct(string $method, array  $arguments)
    {
        $this->method = $method;
        $this->arguments = $arguments;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }
}