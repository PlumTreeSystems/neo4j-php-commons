<?php

namespace Neo4j\Common\Tests\Collection;

use Neo4j\Common\Collection\ArrayList;
use Neo4j\Common\Collection\Map;
use Neo4j\Common\Collections;

class CollectionsTest extends \PHPUnit_Framework_TestCase
{
    public function testListCreation()
    {
        $listcoll = Collections::asList([1,2,3]);
        $this->assertInstanceOf(ArrayList::class, $listcoll);
        $this->assertCount(3, $listcoll->getElements());
    }

    public function testMapCreation()
    {
        $mapcoll = Collections::asMap(['hello' => 'you']);
        $this->assertInstanceOf(Map::class, $mapcoll);
        $this->assertCount(1, $mapcoll->getElements());
    }
}