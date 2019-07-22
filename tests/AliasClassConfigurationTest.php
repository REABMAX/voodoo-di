<?php namespace Voodoo\Di\Tests;

use Voodoo\Di\AliasClassConfiguration;
use Voodoo\Di\Tests\Example\Class1;

class AliasClassConfigurationTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function test_fqcn_is_correct()
    {
        $config = new AliasClassConfiguration('class1', Class1::class);
        $this->assertEquals('class1', $config->getAlias());
    }

    public function test_alias_is_correct()
    {
        $config = new AliasClassConfiguration('class1', Class1::class);
        $this->assertEquals(Class1::class, $config->getFqcn());
    }
}