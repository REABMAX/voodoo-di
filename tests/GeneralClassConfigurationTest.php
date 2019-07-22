<?php namespace Voodoo\Di\Tests;

use Voodoo\Di\ConstructorArgument;
use Voodoo\Di\GeneralClassConfiguration;
use Voodoo\Di\SetterArgument;
use Voodoo\Di\Tests\Example\Class1;

class GeneralClassConfigurationTest extends \Codeception\Test\Unit
{
    /**
     * @var GeneralClassConfiguration
     */
    protected $configuration;

    protected function _before()
    {
        $this->configuration = new GeneralClassConfiguration(Class1::class, [
            'arguments' => [
                'value1'
            ],
            'setters' => [
                'setProperty2' => ['value2']
            ]
        ]);
    }

    protected function _after()
    {
    }

    // tests
    public function test_fqcn_is_set_correctly()
    {
        $fcqn = $this->configuration->getFqcn();
        $this->assertEquals(Class1::class, $fcqn);
    }

    public function test_constructor_arguments_are_parsed_correctly()
    {
        $args = $this->configuration->getConstructorArguments();
        $this->assertCount(1, $args);
        $this->assertIsArray($args);

        /** @var ConstructorArgument $argument */
        $argument = array_shift($args);
        $this->assertInstanceOf(ConstructorArgument::class, $argument);
        $this->assertEquals('value1', $argument->getValue());
    }

    public function test_setter_arguments_are_parsed_correctly()
    {
        $setters = $this->configuration->getSetterArguments();
        $this->assertCount(1, $setters);
        $this->assertIsArray($setters);

        /** @var SetterArgument $setter */
        $setter = array_shift($setters);
        $this->assertInstanceOf(SetterArgument::class, $setter);
        $this->assertEquals('setProperty2', $setter->getMethod());

        $args = $setter->getArguments();
        $this->assertIsArray($args);
        $arg = array_shift($args);
        $this->assertEquals('value2', $arg);
    }

    public function test_constructor_arguments_is_always_array()
    {
        $config = new GeneralClassConfiguration(Class1::class, []);
        $args = $config->getConstructorArguments();
        $this->assertIsArray($args);
    }

    public function test_setter_arguments_is_always_array()
    {
        $config = new GeneralClassConfiguration(Class1::class, []);
        $setters = $config->getSetterArguments();
        $this->assertIsArray($setters);
    }
}