<?php

namespace Neo4j\Common\Type;

interface Date
{
    /**
     * Date constructor.
     * @param int $daysSinceEpoch
     */
    public function __construct(int $daysSinceEpoch);

    /**
     * @return int
     */
    public function getDaysSinceEpoch(): int;
}
