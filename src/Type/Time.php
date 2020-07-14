<?php

namespace Neo4j\Common\Type;

interface Time
{
     /**
     * @return int
     */
    public function getNanoSecondsSinceMidnight(): int;

     /**
     * @return int
     */
    public function getZoneOffset(): int;
}