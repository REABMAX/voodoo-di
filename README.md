# voodoo-di
Aura.DI configuration bundle for my project skeleton

## Usage

```
<?php

$eventDispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
$containerBuilder = new Aura\Di\ContainerBuilder();
$container = $containerBuilder->newConfiguredInstance(
    new \Voodoo\Di\ConfigurationBundle($eventDispatcher),
    true
);
```