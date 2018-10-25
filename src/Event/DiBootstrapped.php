<?php

namespace Voodoo\Di\Event;

use Symfony\Component\EventDispatcher\Event;
use Voodoo\Di\ConfigurationCollection;

/**
 * Class DiBootstrapped
 * @package Voodoo\Di\Event
 */
class DiBootstrapped extends Event
{
    /**
     * @var ConfigurationCollection
     */
    protected $configurationCollection;

    /**
     * DiBootstrapped constructor.
     * @param ConfigurationCollection $configurationCollection
     */
    public function __construct(ConfigurationCollection $configurationCollection)
    {
        $this->configurationCollection = $configurationCollection;
    }

    /**
     * @return ConfigurationCollection
     */
    public function getConfigurationCollection(): ConfigurationCollection
    {
        return $this->configurationCollection;
    }
}