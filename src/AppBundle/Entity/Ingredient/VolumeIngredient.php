<?php

namespace AppBundle\Entity\Ingredient;

use AppBundle\Strategy\WeightStrategy;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class VolumeIngredient extends Ingredient
{
    public function __toString()
    {
        return "V - ".$this->getName();
    }

    public function getStrategy()
    {
        return new WeightStrategy();
    }
}