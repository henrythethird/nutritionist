<?php

namespace AppBundle\Listener;


use AppBundle\Entity\Unit\VolumeUnit;

class VolumeUnitListener extends BaseUnitListener
{
    protected function getClass()
    {
        return VolumeUnit::class;
    }
}