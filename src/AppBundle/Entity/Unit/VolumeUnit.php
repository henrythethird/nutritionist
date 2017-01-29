<?php

namespace AppBundle\Entity\Unit;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class VolumeUnit extends Unit
{
    public function getBaseUnit()
    {
        return "dl";
    }
}