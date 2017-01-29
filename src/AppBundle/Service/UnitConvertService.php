<?php

namespace AppBundle\Service;

use AppBundle\Entity\Embeddable\MeasureEmbeddable;
use AppBundle\Entity\Unit\Unit;

class UnitConvertService
{
    /**
     * @param MeasureEmbeddable $measure
     * @param Unit $toUnit
     * @return MeasureEmbeddable
     */
    public function convert(MeasureEmbeddable $measure, Unit $toUnit)
    {
        $fromUnit = $measure->getUnit();
        if (!$this->canConvert($fromUnit, $toUnit)) {
            throw new \InvalidArgumentException(sprintf(
                "Cannot convert from %s to %s", $fromUnit, $toUnit
            ));
        }

        return new MeasureEmbeddable(
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