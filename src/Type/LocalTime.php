<?php

namespace Neo4j\Common\Type;

interface LocalTime
{
     /**
     * @return int
     */
    public function getNanoSecondsSinceMidnight(): int;
}
