<?php

namespace AppBundle\Aggregate;

use AppBundle\Entity\Day\Day;

class DayAggregate
{
    private $positions;
    private $day;

    public function __construct(Day $day)
    {
        $this->day = $day;
        $this->aggregate();
    }

    private function aggregate()
    {
        $previous = null;
        $headerName = "";
        $aggregated = [];
        foreach ($this->day->getPositions() as $position) {
            $headerName = $position->getType()->getName();
            if ($previous != $headerName && $previous) {
                $this->positions[] = new Header($previous, $aggregated);
                $aggregated = [];
            }
            $aggregated[] = $position;
            $previous = $headerName;
        }
        if ($aggregated) {
            $this->positions[] = new Header($headerName, $aggregated);
        }
    }

    /**
     * @return Header[]
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * @return Day
     */
    public function getDay()
    {
        return $this->day;
    }
}