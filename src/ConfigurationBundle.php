<?php

namespace Voodoo\Di;

use Aura\Di\ConfigCollection;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Voodoo\Di\Event\DiBootstrapped;

/**
 * Class ConfigurationBundle
 * @package Voodoo\Di
 */
class ConfigurationBundle extends ConfigCollection
{
    /**
     * In the bootstrapping layer, Aura.DI-Configuration can be committed via event listeners.
     * They will be merged in this ConfigurationBundle
     *
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $event = new DiBootstrapped(new ConfigurationCollection());
        $eventDispatcher->dispatch('voodoo.bootstrap.di', $event);
        parent::__construct($event->getConfigurationCollection()->all());
    }
}