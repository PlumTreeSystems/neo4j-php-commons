<?php

namespace Neo4j\Common\Type;

interface Point3D
{
    /**
     * @return float
     */
    public function getX(): float;

    /**
     * @return float
     */
    public function getY(): float;

    /**
     * @return float
     */
    public function getZ(): float;

    /**
     * @return int
     */
    public function getSrid(): int;

}