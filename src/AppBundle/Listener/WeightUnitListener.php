<?php

namespace AppBundle\Listener;

use AppBundle\Entity\Unit\WeightUnit;

class WeightUnitListener extends BaseUnitListener
{
    protected function getClass()
    {
        return WeightUnit::class;
    }
}