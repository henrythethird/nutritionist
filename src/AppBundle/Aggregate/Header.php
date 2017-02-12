<?php

namespace AppBundle\Aggregate;

use AppBundle\Collection\PositionInterface;

class Header
{
    private $header;
    private $positions;

    /**
     * @param string $header
     * @param PositionInterface[] $positions
     */
    public function __construct($header, $positions)
    {
        $this->header = $header;
        $this->positions = $positions;
    }

    /**
     * @return string
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @return PositionInterface[]
     */
    public function getPositions()
    {
        return $this->positions;
    }
}