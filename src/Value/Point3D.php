<?php


namespace Neo4j\Common\Value;

use Neo4j\Common\Type\Point3D as TypePoint3D;

class Point3D implements TypePoint3D
{

    protected $z;

    protected $x;

    protected $y;

    protected $srid;

    /**
     * Point3D constructor.
     * @param $x
     * @param $y
     * @param $z
     * @param int $srid
     */
    public function __construct($x, $y, $z, $srid = 9157)
    {
        $this->z = $z;
        $this->x = $x;
        $this->y = $y;
        $this->srid = $srid;
    }

    /**
     * @return float
     */
    public function getZ(): float
    {
        return $this->z;
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
