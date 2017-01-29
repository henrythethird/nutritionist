<?php

namespace AppBundle\Entity\Embeddable;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
class NutritionEmbeddable
{
    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     */
    private $starch;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     */
    private $protein;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     */
    private $fat;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=6)
     */
    private $calories;
}