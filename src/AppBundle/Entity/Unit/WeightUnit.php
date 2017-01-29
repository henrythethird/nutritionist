<?php

namespace AppBundle\Entity\Unit;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class WeightUnit extends Unit
{
    public function getBaseUnit()
    {
        return "kg";
    }
}