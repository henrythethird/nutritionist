<?php

namespace AppBundle\Entity\Embeddable;

use AppBundle\Entity\Unit\Unit;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
class MeasureEmbeddable
{
    /**
     * @ORM\Column(type="float", precision=12, scale=6)
     */
    private $amount;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Unit\Unit")
     */
    private $unit;

    public function __construct($amount = 0, Unit $unit = null)
    {
        $this->amount = $amount;
        $this->unit = $unit;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return Unit
     */
    public function getUnit()
    {
        return $this->unit;
    }

    public function setUnit(Unit $unit)
    {
        $this->unit = $unit;
    }
}