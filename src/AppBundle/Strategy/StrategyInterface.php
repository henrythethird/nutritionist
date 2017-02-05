<?php

namespace AppBundle\Strategy;

use AppBundle\Entity\Embeddable\MeasureEmbeddable;

interface StrategyInterface
{
    public function calculateMultiplier(MeasureEmbeddable $measure);
}