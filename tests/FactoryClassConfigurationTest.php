<?php namespace Voodoo\Di\Tests;

use Voodoo\Di\FactoryClassConfiguration;
use Voodoo\Di\Tests\Example\Class1;

class FactoryClassConfigurationTest extends \Codeception\Test\Unit
{
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function test_fcqn_is_correct()
    {
        $config = new FactoryClassConfiguration(Class1::class, function() {
            return new Class1('value1');
        });
        $this->assertEquals(Class1::class, $config->getFqcn());
    }

    public function test_callable_can_be_callback()
    {
        $config = new FactoryClassConfiguration(Class1::class, function() {
            return new Class1('value1');
        });

        $callable = $config->getCallable();
        $this->assertIsCallable($callable);
        /** @var Class1 $value */
        $value = $callable();
        $this->assertInstanceOf(Class1::class, $value);
        $this->assertEquals('value1', $value->getProperty1());
    }

    public function test_callable_can_be_invokable_object()
    {
        $config = new FactoryClassConfiguration(Class1::class, new class () {
            public function __invoke()
            {
                return new Class1('value1');
            }
        });
        $callable = $config->getCallable();
        $this->assertIsCallable($callable);
        /** @var Class1 $value */
        $value = $callable();
        $this->assertInstanceOf(Class1::class, $value);
        $this->assertEquals('value1', $value->getProperty1());
    }
}