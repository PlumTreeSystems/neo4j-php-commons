<?php

namespace Neo4j\Common\Type;

interface LocalDateTime
{
    /**
     * @return int
     */
    public function getEpochSeconds(): int;

    /**
     * @return int
     */
    public function getNanoseconds(): int;
}
