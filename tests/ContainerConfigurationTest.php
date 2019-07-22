<?php namespace Voodoo\Di\Tests;

use Voodoo\Di\AliasClassConfiguration;
use Voodoo\Di\ContainerConfiguration;
use Voodoo\Di\FactoryClassConfiguration;
use Voodoo\Di\GeneralClassConfiguration;
use Voodoo\Di\Tests\Example\Class1;

class ContainerConfigurationTest extends \Codeception\Test\Unit
{
    /**
     * @var ContainerConfiguration
     */
    protected $configuration;

    protected function _before()
    {
        $this->configuration = new ContainerConfiguration([
            'definitions' => [
                Class1::class => [
                    'arguments' => ['value1'],
                    'setters' => [
                        'setProperty2' => ['value2'],
                    ],
                ],
            ],
            'factories' => [
                Class1::class => function() {
                    $obj = new Class1('value1');
                    $obj->setProperty2('value2');
                    return $obj;
                }
            ],
            'aliases' => [
                'class1' => Class1::class,
            ]
        ]);
    }

    protected function _after()
    {
    }

    // tests
    public function test_definitions_get_parsed_correctly()
    {
        $definitions = $this->configuration->getDefinitions();
        $this->assertCount(1, $definitions);

        /** @var GeneralClassConfiguration $definition */
        $definition = array_shift($definitions);
        $this->assertInstanceOf(GeneralClassConfiguration::class, $definition);
    }

    public function test_factories_get_parsed_correctly()
    {
        $factories = $this->configuration->getFactories();
        $this->assertCount(1, $factories);

        /** @var FactoryClassConfiguration $factory */
        $factory = array_shift($factories);
        $this->assertInstanceOf(FactoryClassConfiguration::class, $factory);
    }

    public function test_aliases_get_parsed_correctly()
    {
        $aliases = $this->configuration->getAliases();
        $this->assertCount(1, $aliases);

        /** @var AliasClassConfiguration $alias */
        $alias = array_shift($aliases);
        $this->assertInstanceOf(AliasClassConfiguration::class, $alias);
    }
}