<?php


namespace Neo4j\Common\Value;

use Neo4j\Common\Type\Point2D as TypePoint2D;

class Point2D implements TypePoint2D
{
    protected $x;

    protected $y;

    protected $srid;

    /**
     * Point2D constructor.
     * @param $x
     * @param $y
     * @param $srid
     */
    public function __construct($x, $y, $srid = 7203)
    {
        $this->x = $x;
        $this->y = $y;
        $this->srid = $srid;
    }

    /**
     * @return float
     */
    public function getX(): float
    {
        return $this->x;
    }

    /**
     * @return float
     */
    public function getY(): float
    {
        return $this->y;
    }

    /**
     * @return int
     */
    public function getSrid(): int
    {
        return $this->srid;
    }
}
