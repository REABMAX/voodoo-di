<?php

namespace Voodoo\Di;

use Voodoo\Di\Contracts\Alias;

/**
 * Class AliasClassConfiguration
 * @package Voodoo\Di
 */
class AliasClassConfiguration implements Alias
{
    /**
     * @var string
     */
    protected $alias = '';

    /**
     * @var mixed
     */
    protected $fqcn = '';

    /**
     * AliasClassConfiguration constructor.
     * @param string $alias
     * @param mixed $fqcn
     */
    public function __construct(string $alias, $fqcn)
    {
        $this->alias = $alias;
        $this->fqcn = $fqcn;
    }

    /**
     * @return string
     */
    public function getAlias(): string
    {
        return $this->alias;
    }

    /**
     * @return mixed
     */
    public function getFqcn()
    {
        return $this->fqcn;
    }
}