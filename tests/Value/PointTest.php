<?php


namespace Neo4j\Common\Tests\Value;

use Neo4j\Common\Value\Point2D;
use Neo4j\Common\Value\Point3D;

/**
 * Class DateTimeConversionTest
 * @group unit
 */
class PointTest extends \PHPUnit_Framework_TestCase
{
    public function testPoint2DCreation()
    {
        $point = new Point2D(12.5, 13.5);
        $this->assertEquals(12.5, $point->getX());
        $this->assertEquals(13.5, $point->getY());
        $this->assertEquals(7203, $point->getSrid());
    }

    public function testPoint3DCreation()
    {
        $point = new Point3D(12.5, 13.5, 14.5);
        $this->assertEquals(12.5, $point->getX());
        $this->assertEquals(13.5, $point->getY());
        $this->assertEquals(14.5, $point->getZ());
        $this->assertEquals(9157, $point->getSrid());
    }
}
