<?php namespace Voodoo\Di\Tests;

use League\Container\Container;
use Voodoo\Di\Configurators\LeagueContainerConfigurator;
use Voodoo\Di\ContainerConfiguration;
use Voodoo\Di\Tests\Example\Class1;

class LeagueContainerConfiguratorTest extends \Codeception\Test\Unit
{
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function test_definition_works_for_container()
    {
        $configurator = new LeagueContainerConfigurator(new Container());
        $configuration = new ContainerConfiguration([
            'definitions' => [
                Class1::class => [
                    'arguments' => ['value1'],
                    'setters' => [
                        'setProperty2' => ['value2']
                    ]
                ]
            ]
        ]);
        $container = $configurator->configureContainer($configuration);

        $this->assertTrue($container->has(Class1::class));
        /** @var Class1 $obj */
        $obj = $container->get(Class1::class);
        $this->assertObjectHelper($obj);
    }

    public function test_factory_works_for_container()
    {
        $configurator = new LeagueContainerConfigurator(new Container());
        $configuration = new ContainerConfiguration([
            'factories' => [
                Class1::class => function() {
                    $obj = new Class1('value1');
                    $obj->setProperty2('value2');
                    return $obj;
                }
            ]
        ]);
        $container = $configurator->configureContainer($configuration);

        $this->assertTrue($container->has(Class1::class));
        /** @var Class1 $obj */
        $obj = $container->get(Class1::class);
        $this->assertObjectHelper($obj);
    }

    public function test_alias_works_for_container()
    {
        $configurator = new LeagueContainerConfigurator(new Container());
        $configuration = new ContainerConfiguration([
            'aliases' => [
                'class1' => Class1::class,
            ],
            'definitions' => [
                Class1::class => [
                    'arguments' => ['value1'],
                    'setters' => [
                        'setProperty2' => ['value2']
                    ]
                ],
            ]
        ]);
        $container = $configurator->configureContainer($configuration);

        $this->assertTrue($container->has('class1'));
        /** @var Class1 $obj */
        $obj = $container->get('class1');
        $this->assertObjectHelper($obj);
    }

    protected function assertObjectHelper(Class1 $obj)
    {
        $this->assertInstanceOf(Class1::class, $obj);
        $this->assertEquals('value1', $obj->getProperty1());
        $this->assertEquals('value2', $obj->getProperty2());
    }
}