<?php

namespace AppBundle\Service;

use AppBundle\Entity\Measure;
use AppBundle\Entity\Unit\Unit;
use AppBundle\Exception\InvalidConversionException;

class UnitConvertService
{
    /**
     * @param Measure $measure
     * @param Unit $toUnit
     * @return Measure
     * @throws InvalidConversionException
     */
    public function convert(Measure $measure, Unit $toUnit)
    {
        $fromUnit = $measure->getUnit();
        if (!$this->canConvert($fromUnit, $toUnit)) {
            throw new InvalidConversionException(sprintf(
                "Cannot convert from %s to %s", $fromUnit, $toUnit
            ));
        }

        return new Measure(
            $this->calculateAmount($measure->getAmount(), $fromUnit, $toUnit),
            $toUnit
        );
    }

    private function canConvert(Unit $from, Unit $to)
    {
        return $from->getBaseUnit() == $to->getBaseUnit();
    }

    private function calculateAmount($amount, Unit $fromUnit, Unit $toUnit)
    {
        return $amount * $toUnit->getBaseRatio() / $fromUnit->getBaseRatio();
    }
}