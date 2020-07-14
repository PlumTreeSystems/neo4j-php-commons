<?php

namespace Neo4j\Common\Type;

interface Point2D
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
     * @return int
     */
    public function getSrid(): int;

}