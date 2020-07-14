<?php

namespace Neo4j\Common\Type;

interface DateTimeOffset
{
    /**
     * @return int
     */
    public function getEpochSeconds(): int;

    /**
     * @return int
     */
    public function getNanoseconds(): int;

    /**
     * @return int
     */
    public function getZoneOffset(): int;
}
