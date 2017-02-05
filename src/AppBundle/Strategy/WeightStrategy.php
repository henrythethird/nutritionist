<?php

namespace AppBundle\Strategy;


use AppBundle\Entity\Embeddable\MeasureEmbeddable;

class WeightStrategy implements StrategyInterface
{
    public function calculateMultiplier(MeasureEmbeddable $measure)
    {
        return $measure->getAmount() * $measure->getUnit()->getBaseRatio();
    }
}