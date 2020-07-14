<?php

namespace Neo4j\Common\Type;

interface DateTimeZoned
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
     * @return string
     */
    public function getZoneId(): string;
}
