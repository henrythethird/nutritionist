<?php

namespace AppBundle\Strategy;


use AppBundle\Entity\Embeddable\MeasureEmbeddable;

class ServingStrategy implements StrategyInterface
{
    public function calculateMultiplier(MeasureEmbeddable $measure)
    {
        return $measure->getAmount();
    }
}