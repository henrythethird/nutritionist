<?php

namespace AppBundle\Strategy;


use AppBundle\Collection\PositionInterface;

class WeightStrategy implements StrategyInterface
{
    public function calculateMultiplier(PositionInterface $position)
    {
        $measure = $position->getMeasure();
        return $measure->getAmount() * $measure->getUnit()->getBaseRatio();
    }
}