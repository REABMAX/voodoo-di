<?php

namespace Voodoo\Di;

use PHPUnit\Framework\TestCase;

/**
 * Class ConfigurationCollectionTest
 * @package Voodoo\Di
 */
class ConfigurationCollectionTest extends TestCase
{
    /**
     * @test
     */
    public function push_adds_item_to_collection()
    {
        $collection = new ConfigurationCollection();
        $collection->push('Test');
        $this->assertContains('Test', $collection->all());
    }

    /**
     * @test
     */
    public function push_does_not_add_items_twice()
    {
        $collection = new ConfigurationCollection();
        $collection->push('Test');
        $collection->push('Test');
        $this->assertCount(1, $collection->all());
    }
}