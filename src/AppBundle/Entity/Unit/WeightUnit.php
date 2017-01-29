<?php

namespace AppBundle\Entity\Unit;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WeightUnitRepository")
 */
class WeightUnit extends Unit
{
    public function getBaseUnit()
    {
        return "kg";
    }
}