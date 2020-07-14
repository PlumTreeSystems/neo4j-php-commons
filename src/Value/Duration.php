<?php


namespace Neo4j\Common\Value;

use Neo4j\Common\Type\Duration as TypeDuration;

class Duration implements TypeDuration
{
    private $months;

    private $days;

    private $seconds;

    private $nanoSeconds;

    /**
     * Duration constructor.
     * @param $months
     * @param $days
     * @param $seconds
     * @param $nanoSeconds
     */
    public function __construct($months, $days, $seconds, $nanoSeconds)
    {
        $this->months = $months;
        $this->days = $days;
        $this->seconds = $seconds;
        $this->nanoSeconds = $nanoSeconds;
    }

    /**
     * @param \DateInterval $interval
     * @return static
     */
    public static function fromDateInterval(\DateInterval $interval): self
    {
        // Years are turned into months, minutes and hours are turned into seconds
        return new self(
            (int)$interval->format('%m') + (int)$interval->format('%y') * 12,
            (int)$interval->format('%d'),
            (int)$interval->format('%s')
            + (int)$interval->format('%i') * 60
            + (int)$interval->format('%h') * 3600,
            (int)$interval->format('%f') * 1000
        );
    }

    public function toDateInterval(): \DateInterval
    {
        return new \DateInterval(sprintf(
            'P%dM%dDT%dS',
            $this->months,
            $this->days,
            $this->seconds
        ));
    }

    /**
     * @return int
     */
    public function getMonths(): int
    {
        return $this->months;
    }

    /**
     * @return int
     */
    public function getDays(): int
    {
        return $this->days;
    }

    /**
     * @return int
     */
    public function getSeconds(): int
    {
        return $this->seconds;
    }

    /**
     * @return int
     */
    public function getNanoSeconds(): int
    {
        return $this->nanoSeconds;
    }

}
