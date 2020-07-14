<?php

namespace Neo4j\Common\Type;

interface Duration
{
    /**
     * @return int
     */
    public function getMonths(): int;

    /**
     * @return int
     */
    public function getDays(): int;

    /**
     * @return int
     */
    public function getSeconds(): int;

    /**
     * @return int
     */
    public function getNanoSeconds(): int;
}
