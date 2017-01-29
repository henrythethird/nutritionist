<?php

namespace AppBundle\Entity\Unit;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VolumeUnitRepository")
 */
class VolumeUnit extends Unit
{
    public function getBaseUnit()
    {
        return "l";
    }
}